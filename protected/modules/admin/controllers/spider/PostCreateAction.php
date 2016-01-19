<?php
/**
 *  添加文章采集
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class PostCreateAction extends CAction
{	
	public function run(){        
        $model = new SpiderSetting();        
        if ( isset( $_POST['SpiderSetting'] ) ) {
            $this->_startSpider($_POST['SpiderSetting']);
            exit;
        }
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('type' => $this->controller->_type_ids['post']));
        $criteria->addCondition('total_page > cur_page');
        //可以采集的站点
        $settings = $model->findAll($criteria);
        $sites = array();
        if($settings) {
            foreach($settings as $v) {
                $sites[$v->id] = $v->site;
            }
        } else {
            $this->controller->message('error', Yii::t('admin', 'No Enable Site Data'));
        }         
        $this->controller->render( 'postcreate', array ( 'model' => $model , 'sites' => $sites) );
	}
    
    /**
     * 开始采集
     * 
     * @param array $data
     */
    private function _startSpider($data = array())
    {        
        Yii::import('admin.extensions.simple_html_dom',true);
        set_time_limit(600);
        echo "<style>"
                . "body{ "
                . "font-family:Monaco, DejaVu Sans Mono, Bitstream Vera Sans Mono, Consolas, Courier New, monospace; "
                . "font-size:14px; "
                . "line-height:1.8em; "
                . "background-color:#000000; "
                . "padding:20px;"
                . "color:#FFFFFF;}"
                . "</style>";
        echo "<br/>--------采集数据[start]--------<br/>";
        $site_id = $data['id'];
        $site = SpiderSetting::model()->findByPk($site_id);
        
        //默认是第一页
        if ($site->cur_page <= 0) {
            $url = $site->url;
            $page = 1;
        } else {
            $page_rule = $site->page_rule;
            $reg = '/\[PAGE_NUM]/is';
            preg_match($reg, $page_rule, $matches);
            if (!$matches || !$matches[0]) {
                exit('页码规则无法解析');
            }
            $page = '0' . intval($site->cur_page + 1);
            $url = preg_replace($reg, $page, $page_rule);
        }
        $html = file_get_html($url);
        if(!$html) {
            echo "<br/>站点地址有误！无法采集数据！";
            exit;
        }
        $lists = $html->find($site->item_rule_li);
        if(!$lists) {
            echo "<br/>列表项Li标签选择器规则有误！匹配不到列表数据！";
            exit;
        }        
        foreach ($lists as $item) {
            $postListModel = new SpiderPostList();
            $postContentModel = new SpiderPostContent();        
            ob_flush();
            flush();
            //匹配标题
            $a = $item->find($site->item_rule_a, 0);
            if(!$a) {
                echo "<br/>列表项A标签选择器规则有误！匹配不到列表项数据！";
                exit;
            }
            $exist = $postListModel->find('url = "' .$a->href. '"');
            if ($exist) {                
                continue;
            }
            $postListModel->attributes = array(
                'site_id' => $site->id,
                'url' => $a->href,
                'title' => $site->list_charset != 'UTF-8' ? mb_convert_encoding($a->innertext, 'UTF-8', $site->list_charset) : $a->innertext,
                'status'=> SpiderPostList::STATUS_NONE_C
            );
            if(!$postListModel->save()) {
                echo "<br/>采集失败：";
                var_export($postListModel->getErrors());
                exit;
            }
            $list_id = $postListModel->id;
            //匹配内容
            $html = file_get_html($a->href);
            if(!$html) {
                continue;
            }
            $getContent = $html->find($site->content_rule, 0);
            if(!$getContent) {
                echo "<br/>详情页标签选择器规则有误！匹配不到内容数据！";
                exit;
            }
            $content = addslashes($getContent->innertext);
            $data = array(
                'list_id'   => $list_id,
                'content'   => $site->content_charset != 'UTF-8' ? mb_convert_encoding($content, 'UTF-8', $site->content_charset) : $content
            );            
            $exist_c = $postContentModel->find('list_id='.$list_id);
            if($exist_c) {
                $exist_c->content = $data['content'];
                $save_content = $exist_c->save();                
            } else {
                $postContentModel->attributes = $data;
                $save_content = $postContentModel->save();
            }
            
            if(!$save_content) {
                echo "<br/>采集失败：";
                var_export($postContentModel->getErrors());
                exit;
            }  
            $postListModel->status = SpiderPostList::STATUS_C;
            if(!$postListModel->save()) {
                echo "<br/>采集失败：";
                var_export($postListModel->getErrors());
                exit;
            }            
            echo "<br/>采集 <span style='color:grey'>\"{$postListModel->title}\"</span> 完成.";
        }
        //更新页数
        $site->cur_page = $page;
        $site->save();
        echo "<br/>--------采集完成[end]--------<br/>";
    }
}