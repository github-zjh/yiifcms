<?php
/**
 * 评论控制器
 *
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class CommentController extends FrontBase
{
    //所有动作
    public function actions()
    {
        $extra_actions = array(
            'captcha'=>array(
                'class'=>'MyCaptchaAction',
                'backColor'=>0xFFFFFF,  //背景色
                'foreColor'=> 0x3C5880,	//前景色
                'fontFile' =>  $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
                'padding'=>0,
                'width' => 100,
                'height'=>30,
                'minLength'=>4,
                'maxLength'=>6,
                'testLimit'=>0,   //不限制输错次数
                'offset' => 2,    //字符间距
            ),
        );
        $actions = $this->actionMapping(array(
            'create'    => 'Create',        //评论
            'reply'     => 'Reply',         //回复                  
        ), 'application.controllers.comment');
        return array_merge($actions, $extra_actions);
    }
  
}
