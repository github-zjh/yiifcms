<?php
/**
 * 添加推荐内容
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
    public $content_id = '';
    public $type_key   = '';
    public $type_id    = 0;
    
	public function run(){
		
        $this->content_id = trim(Yii::app()->request->getParam('content_id'));
        $this->type_key = strtolower(trim(Yii::app()->request->getParam('type_key')));
        $type = ModelType::model()->findByAttributes(array('type_key' => $this->type_key));
        if(!$type) {
            $this->controller->message('error', Yii::t('admin','Invialid Content Type'));
        }
        if(!$this->content_id) {
            $this->controller->message('error', Yii::t('admin','Invialid Content'));
        }
        $this->type_id = $type->id;
        if(Yii::app()->request->isPostRequest) {
            //提交推荐
            $this->submitData();        
        }
        
        //所有推荐位
        $positionModel = new RecommendPosition();
		$criteria = new CDbCriteria();
        $criteria->order = 'id ASC';
        
        //统计	        
        $count = $positionModel->count($criteria);        
    	//分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;        
        $pages->applyLimit($criteria);
        
        //查询
        $result = $positionModel->findAll( $criteria );        
        $this->controller->render( 'create', array ( 'model' => $positionModel,  'datalist' => $result , 'pagebar' => $pages ) );
	}
    
    //提交推荐位和数据
    private function submitData()
    {        
        $position_id = intval(Yii::app()->request->getParam('position_id'));
        if(!$position_id) {
            $this->controller->message('error', Yii::t('admin','Please Select A Recommend Position'));
        }
        $contentModel = ucfirst($this->type_key);
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', explode(',', $this->content_id));
        $criteria->select = 'id, title';
        $content = $contentModel::model()->findAll($criteria);
        if(!$content) {
            $this->controller->message('error', Yii::t('admin','Invialid Content'));
        }                      
        foreach($content as $c) {
            $model = new Recommend();
            $exist = $model->findByAttributes(array( 'position_id' => $position_id, 'content_id' => $c->id, 'type' => $this->type_id));
            if($exist) {                
                $exist->title = $c->title;
                $exist->create_time = time();
                $exist->save();              
            } else {                
                $model->position_id = $position_id;
                $model->content_id = $c->id;
                $model->title = $c->title;
                $model->type  = $this->type_id;
                $model->sort_order  = 0;
                $model->create_time = time();
                $model->save();                
            }
            //改变内容推荐状态
            $contentModel::model()->updateByPk($c->id, array('commend' => 'Y'));            
        }                      
        $this->controller->message('success',Yii::t('admin','Recommend Success'),$this->controller->createUrl('index'));                
    }
}