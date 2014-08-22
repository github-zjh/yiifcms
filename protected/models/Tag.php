<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $tag_name
 * @property string $data_count
 */
class Tag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tag}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag_name', 'required'),
			array('tag_name', 'length', 'max'=>100),
			array('data_count', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag_name, data_count', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'tag_name' => 'Tag Name',
			'data_count' => 'Data Count',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('tag_name',$this->tag_name,true);

		$criteria->compare('data_count',$this->data_count,true);

		return new CActiveDataProvider('Tag', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Tag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 *
	 *  插入或者更新内容时，同时更新标签数据
	 *  @author Sim <326196998@qq.com>
	 *  @param $tagdata tag数据 
	 *  @param $param [content_id]关联内容id [status]关联内容状态 [type_id](1-5) 
	 *
	 **/
	public static function updateTagData($tagdata = array(), $param = array()){
		foreach ((array) $tagdata as $value) {    	
			if($value){		
				$model_tag = new Tag();
				$get_tags = $model_tag->find('tag_name=:tagname', array(':tagname'=>$value));
				if($get_tags){    					
					$tag_id = $get_tags->id;
				}else{
					$model_tag->data_count = 1;
					$model_tag->tag_name = $value;
					$model_tag->save();
					$tag_id = $model_tag->id;    				
				}
				//添加关联表数据
				$tagData = TagData::model()->findByPk(array('tag_id'=>$tag_id, 'content_id'=>$param['content_id']));
				if(!$tagData){
					$tagData = new TagData();
					$tagData->tag_id = $tag_id;
					$tagData->content_id = $param['content_id'];
					$tagData->type = $param['type_id'];
					$tagData->status = $param['status'];
					$tagData->save();
				}
			}
		}
		//更新关联的标签状态
		$tagData = TagData::model()->updateAll(array('status'=>$param['status']),'content_id =:id AND type =:type', array(':id'=>$param['content_id'], ':type'=>$param['type_id']));
		return true;
	}

}
