<?php

/**
 *  ajax操作
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */
class AjaxAction extends CAction {

    public function run() {        
        $act = Yii::app()->request->getParam('act');        
        switch ($act) {            
            case 'catChildren':   //获取子分类
                $ret = $this->_getCatalogChildren();
                break;
            default:
                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Operation Failed'));
                break;            
        }        
        exit(CJSON::encode($ret));
    }
    
    /**
     * 获取分类下子分类
     * 
     * @return array
     */
    private function _getCatalogChildren()
    {
        $parent_id = intval(Yii::app()->request->getParam('catalog_id'));
        return Catalog::getChildren($parent_id, true, $this->controller->_type_ids['soft']);
    }
}
