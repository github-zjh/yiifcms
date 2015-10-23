<?php
/**
 * 数据库管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */


class DatabaseController extends Backend
{
    //数据库备份路径
    public $backup = '';
    //分隔sql线
    public $cutline = '-----------------------------------mysql_cut_line---------------------------------';
    public function init()
    {
        parent::init();
        $this->backup = ROOT_PATH.'/protected/data/backup';
    }
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'        => 'Index',         //列表页
            'query'        => 'Query',         //执行查询
            'install'      => 'Install',       //安装测试数据
            'export'       => 'Export',        //数据库导出
            'import'       => 'Import',        //数据库还原
            'batch'        => 'Batch',         //数据库批量操作
        ), 'application.modules.admin.controllers.datebase');
        return array_merge($actions, $extra_actions);
    }
    
    /**
     * 执行SQL
     * 
     * @param type $command
     */
    public function execute ($command = '')
    {        
        $formatExeSql = is_array($command) ? $command : array($command);
        echo "<br/>开始执行<hr/>";
        foreach ($formatExeSql as $sql) {
            if (empty($sql)) {
                continue;
            }            
            try {
                $type = 'other';
                if(preg_match('/(SELECT|DESC|SHOW|CHECK|REPAIR)/i', $sql)) {
                    $type = 'query';
                    $resultData = Yii::app()->db->createCommand($sql)->queryAll();                    
                } else {                    
                    $resultData = Yii::app()->db->createCommand($sql)->execute();                
                }
                if ($resultData) {                    
                    if ($type == 'query') {                                                
                        $fields = array_keys($resultData[0]);
                        $this->render('query_result', array ('fields' => $fields , 'dataList' => $resultData , 'command' => $command ));
                    } else {
                        echo "<div style='color:red;padding:10px 0'>执行完成: {$sql}</div>";
                    }
                } else {
                    echo "<div style='color:red;padding:10px 0'>执行失败: sql:{$sql}</div>";                    
                }
             } catch (Exception $e) {
                echo "<div style='color:red;padding:10px 0'>执行失败: ".$e->getMessage()."</div>";                
            }            
        }
    }
  
}