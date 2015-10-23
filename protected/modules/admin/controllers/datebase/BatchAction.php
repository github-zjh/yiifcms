<?php
/**
 * 批量操作
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class BatchAction extends CAction
{	
	public function run(){		
        $tables = Yii::app()->request->getParam('table');
        $command = Yii::app()->request->getParam('command');
        empty( $tables ) && $this->controller->message( 'error', Yii::t('admin','No Select') );
        if(!is_array($tables)) {
            $tables = array($tables);
        }
        $sel_tables = implode(',', $tables);
        switch ( $command ) {
            case 'optimze':      
                //优化表
                $this->controller->execute("OPTIMIZE TABLE {$sel_tables}");                         
                break;
            case 'check':      
                //检查表
                $this->controller->execute("CHECK TABLE {$sel_tables}");                         
                break;
            case 'analyze':      
                //分析表
                $this->controller->execute("ANALYZE TABLE {$sel_tables}");                         
                break;
            case 'repair':      
                //修复表
                $this->controller->execute("REPAIR TABLE {$sel_tables}");                         
                break;
            case 'show':      
                //查看表结构
                foreach($tables as $t) {
                    $this->controller->execute("DESC {$t}");
                }
                break;
            default:
                $this->controller->message('error', Yii::t('admin','Error Operation'));                
        }         	
	}    
    
}