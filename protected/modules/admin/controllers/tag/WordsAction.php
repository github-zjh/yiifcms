<?php

/**
 *  搜索词库
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */
class WordsAction extends CAction
{
    public function run()
    {
        //词库文件路径
        $words_file = Yii::getPathOfAlias('ext') . DIRECTORY_SEPARATOR . 'autokeyword' . DIRECTORY_SEPARATOR . 'words.php';
        if (!Helper::is_writeable($words_file)) {
            $this->controller->message('error', $words_file . '文件没有读写权限');
        }
        if (isset($_POST['words']) && $_POST['words']) {
            $post = explode("\r\n", $_POST['words']);
            //保存词库
            if ($post) {
                $post = array_filter(array_unique($post), function($val){return $val;});
                //先清空配置文件
                file_put_contents($words_file, "<?php return array();?>");
                $words = var_export(array_values($post), true);
                file_put_contents($words_file, "<?php\r\n\r\nreturn {$words};\r\n\r\n?>");
            }
            $this->controller->message('success', Yii::t('admin', 'Update Success'));
        }
        $words = '';
        $arr_words = @include ($words_file);
        if($arr_words) {
            $words = implode("\r\n", $arr_words);
        }
        $this->controller->render('words', array('words' => $words));
    }
}