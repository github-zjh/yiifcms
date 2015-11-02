<?php

/**
 *  视频评分
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class ScoreAction extends CAction {

    public function run() {
        $g = Yii::app()->request->getParam('g');  //1获取 0评分
        $id = Yii::app()->request->getParam('id');
        $s = Yii::app()->request->getParam('s');  //等级0-5
        $res = Video::model()->findByPk($id);
        //t 总人数 s 从低分人数到高分人数分布
        if ($g == 1) {
            if ($res->voted) {
                exit($res->voted);
            } else {
                exit('{"t":0,"s":[0,0,0,0,0]}');
            }
        } else {
            if ($res->voted) {
                $arr_res = CJSON::decode($res->voted);
            } else {
                $arr_res = array('t' => 0, 's' => array(0, 0, 0, 0, 0));
            }
            $arr_res['t'] = $arr_res['t'] + 1;
            $arr_res['s'][$s - 1] = $arr_res['s'][$s - 1] + 1;
            //计算得分
            $avg_1 = $arr_res['t'] > 0 ? round(($arr_res['s'][0] + 2 * $arr_res['s'][1] + 3 * $arr_res['s'][2] + 4 * $arr_res['s'][3] + 5 * $arr_res['s'][4]) / $arr_res['t'] * 2, 1) : '0.0';
            $avg_2 = substr($avg_1, 0, 3);  //取前三位
            $avg = trim($avg_2, '.');    //去除多余的前后.
            $data = CJSON::encode($arr_res);
            $res->voted = $data;
            $res->video_score = $avg;
            $res->save();
            exit('1');
        }
    }

}
