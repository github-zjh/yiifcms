<?php
/**
 *  添加软件采集
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class SoftCreateAction extends CAction
{	
	public function run(){        
        $model = new SpiderSetting();        
        if ( isset( $_POST['SpiderSetting'] ) ) {
            $this->_startSpider($_POST['SpiderSetting']);
            exit;
        }
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('type' => $this->controller->_type_ids['soft']));
        $criteria->addCondition('total_page > cur_page');
        //可以采集的站点
        $settings = $model->findAll($criteria);
        $sites = array('0' => '==请选择站点==');
        if($settings) {
            foreach($settings as $v) {
                $sites[$v->id] = $v->site;
            }
        } else {
            $this->controller->message('error', Yii::t('admin', 'No Enable Site Data'));
        }                 
        $this->controller->render( 'softcreate', array ( 'model' => $model , 'sites' => $sites) );
	}
    
    /**
     * 开始采集
     * 
     * @param array $data
     */
    private function _startSpider($data = array())
    {        
        Yii::import('admin.extensions.simple_html_dom',true);
        set_time_limit(3600);
        echo "<style>"
                . "body{ "
                . "font-family:Monaco, DejaVu Sans Mono, Bitstream Vera Sans Mono, Consolas, Courier New, monospace; "
                . "font-size:14px; "
                . "line-height:1.8em; "
                . "background-color:#000000; "
                . "padding:20px;"
                . "color:#FFFFFF;}"
                . "</style>";        
        $site_id = $data['id'];
        $site = SpiderSetting::model()->findByPk($site_id);
        if(!$site) {
            $this->_stopError('无效的采集站点');
        }
        
        //默认是第一页
        if ($site->cur_page <= 1) {
            $url = $site->url;
            $page = 1;
        } else {
            $page_rule = $site->page_rule;
            $reg = '/\[PAGE_NUM]/is';
            preg_match($reg, $page_rule, $matches);
            if (!$matches || !$matches[0]) {
                $this->_stopError('页码规则无法解析');
            }
            $page = $site->cur_page;
            $url = preg_replace($reg, $page, $page_rule);
        }
        $old_cur_page = intval($page);
        echo "<br/>--------采集第{$old_cur_page}页[start]--------";
        try {
            $html = file_get_html($url);
        } catch (Exception $e) {
            $this->_stopError('站点地址['.$url.']有误！无法采集数据！'.$e->getMessage());
        }
        if(!$html) {
            $this->_stopError('站点地址['.$url.']有误！无法采集数据！');            
        }
        
        $lists = $html->find($site->item_rule_li);
        if(!$lists) {
            $this->_stopError('列表项Li标签选择器规则有误！匹配不到列表数据！');
        }        
        
        foreach ($lists as $item) {
            $postListModel = new SpiderSoftList();
            $postContentModel = new SpiderSoftContent();
            ob_flush();
            flush();
            //匹配标题
            $a = $item->find($site->item_rule_a, 0);
            if(!$a) {
                $this->_stopError('列表项A标签选择器规则有误！匹配不到列表项数据！');
            }
            $view_url = $this->controller->formatViewUrl($url, $a->href);
            $exist = $postListModel->find('url = "' .$view_url. '"');            
            if ($exist) {
                $list_id = $exist->id;
                if ($exist->status != SpiderPostList::STATUS_NONE_C) {
                    continue;
                }
                $postListModel = $exist;
            } else {
                $title = $site->list_charset != 'UTF-8' ? mb_convert_encoding($a->innertext, 'UTF-8', $site->list_charset) : $a->innertext;                
                $postListModel->attributes = array(
                    'site_id' => $site->id,
                    'url'   => $view_url,
                    'title' => trim($title),
                    'status'=> SpiderSoftList::STATUS_NONE_C
                );
                //下载列表中软件图标 如果失败 则从内容中读取
                $title_img = $item->find($site->soft_icon_rule, 0);                
                $soft_icon = '';
                if($title_img) {
                    $img_url = $title_img->src;                                                
                    if ($img_url) {
                        $uploader = new Uploader();
                        $spiderU = $uploader->initSimple('spider');
                        $spiderU->file_ext = Helper::getExtensionName($img_url);
                        $spiderU->getSavePathFromRemote();
                        $download = Helper::downloadImage($img_url, dirname($spiderU->save_path), pathinfo($spiderU->file_name, PATHINFO_FILENAME));
                        if($download) {                            
                            $soft_icon = $spiderU->file_path;                            
                        }
                    }
                }
                if(!$postListModel->save()) {
                    $this->_stopError('数据保存失败:'.var_export($postListModel->getErrors(),true));
                }
                $list_id = $postListModel->id;
            }            
            //匹配内容            
            $html = file_get_html($view_url);
            if(!$html) {
                continue;
            }
            $getContent = $html->find($site->content_rule, 0);
            if(!$getContent) {
                $this->_stopError('详情页标签选择器规则有误！匹配不到内容数据！');
            }            
            //内容正则过滤
            if($site->filter_rule) {
                $reg_arr = explode("\r\n", trim($site->filter_rule));
                try {                    
                    set_error_handler(array('App', 'displayRegErrorHandler'));                
                    $content = preg_replace($reg_arr, '', $getContent->innertext);
                    restore_error_handler();
                } catch (Exception $e) {
                    restore_error_handler();
                    $this->_stopError($e->getMessage());
                }                
            } else {                
                $content = $getContent->innertext;
            }

            //过滤字符 防止xss攻击
            $content = Helper::removeXss($content);

            //下载内容中第一张图片为封面图片
            $imgs = array();
            preg_match('/<img[\s]+src="(.*?)"/is', $content, $imgs);
            $cover_img = '';
            $cover_img_thumb = '';
            if ($imgs && $imgs[1]) {
                $first_img_url = $imgs[1];  
                $spiderU = (new Uploader())->initSimple('spider');
                $spiderU->file_ext = Helper::getExtensionName($first_img_url);
                $spiderU->getSavePathFromRemote();
                $download = Helper::downloadImage($first_img_url, dirname($spiderU->save_path), pathinfo($spiderU->file_name, PATHINFO_FILENAME));
                if($download && !$soft_icon) {
                    //生成缩略图
                    $spiderU->makeThumb();
                    $cover_img = $spiderU->file_path;
                    $soft_icon = $spiderU->thumb_path;
                }
            }        
            $cdata = array(
                'list_id'   => $list_id,
                'soft_img'  => $cover_img,
                'soft_icon' => $soft_icon,
                'content'   => $site->content_charset != 'UTF-8' ? mb_convert_encoding($content, 'UTF-8', $site->content_charset) : $content
            );            
            $exist_c = $postContentModel->find('list_id='.$list_id);
            if($exist_c) {
                $exist_c->content = $cdata['content'];
                $save_content = $exist_c->save();                
            } else {
                $postContentModel->attributes = $cdata;
                $save_content = $postContentModel->save();
            }
            
            if(!$save_content) {
                $this->_stopError('数据保存失败:'.var_export($postContentModel->getErrors(),true));
            }  
            $postListModel->status = SpiderPostList::STATUS_C;
            if(!$postListModel->save()) {
                $this->_stopError('数据保存失败:'.var_export($postListModel->getErrors(),true));
            }            
            echo "<br/>采集 <span style='color:grey'>\"{$postListModel->title}\"</span> 完成.";
        }
        //更新页数        
        $site->cur_page = $old_cur_page+1;
        $site->save();
        echo "<br/>--------采集第{$old_cur_page}页完成[end]--------<br/>";        
        if($site->cur_page <= $site->total_page) {
            $this->_startSpider($data);
        } else {
            exit ("<br/>--------<span style='color:green'>全部采集完成</span>--------<br/>");        
        }
    }
    
    /**
     * 中断提示
     * 
     * @param string $error
     */
    private function _stopError($error = '', $finish = false)
    {
        echo "<br/><span style='color:red'>[Error]</span>{$error}";
        if(!$finish) {
            echo "<br/>--------部分采集完成--------";
        }
        exit;
    }
}