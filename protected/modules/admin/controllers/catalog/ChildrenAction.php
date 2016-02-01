<?php
/**
 *  获取子栏目
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class ChildrenAction extends CAction
{	
	public function run(){
        $parent_id = Yii::app()->request->getParam('id');
        $children = Catalog::getChildren($parent_id);
        if($children) {
            foreach($children as $k => $v) {
                $result[$k] = array(
                    'id'          => $v['id'],
                    'parent_id'   => $v['parent_id'],
                    'name'        => $v['catalog_name'],
                    'type'        => ModelType::getTypeName($v['type']),
                    'status'      => $v['status'],
                    'layer'       => $v['layer'],
                    'sort_order'  => $v['sort_order'],
                    'create_time' => date('Y-m-d H:i', $v['create_time']),
                    'update_time' => date('Y-m-d H:i', $v['update_time']),
                    'children_url'=> $this->controller->createUrl('catalog/children', array('id' => $v['id'])),
                    'update_url'  => $this->controller->createUrl('catalog/update', array('id' => $v['id'])),
                    'delete_url'  => $this->controller->createUrl('catalog/batch', array('command' => 'delete', 'id' => $v['id'])),
                );
            }
        } else {
            $result = array();
        }
        exit(CJSON::encode($result));
	}
}