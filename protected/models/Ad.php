<?php

/**
 * This is the model class for table "{{ad}}".
 *
 * The followings are the available columns in table '{{ad}}':
 * @property string $id
 * @property string $position_id
 * @property string $title
 * @property string $title_alias
 * @property string $link_url
 * @property string $image_url
 * @property integer $width
 * @property integer $height
 * @property string $introduce
 * @property string $attach_file
 * @property string $sort_order
 * @property string $status
 * @property string $create_time
 * @property string $update_time
 */
class Ad extends CActiveRecord
{
    const STATUS_SHOW = 'Y';  //显示
    const STATUS_HIDE = 'N';  //隐藏
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ad}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position_id, title, introduce', 'required'),
			array('width, height', 'numerical', 'integerOnly'=>true),
			array('position_id, sort_order, create_time, update_time', 'length', 'max'=>10),
			array('title', 'length', 'max'=>80),
			array('title_alias', 'length', 'max'=>40),
			array('link_url, image_url, attach_file', 'length', 'max'=>100),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, position_id, title, title_alias, link_url, image_url, width, height, introduce, attach_file, sort_order, status, create_time, update_time', 'safe', 'on'=>'search'),
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
    
    public function beforeSave()
    {
        $now = time();
        if($this->isNewRecord) {            
            $this->create_time = $now;
            $this->update_time = $now;        
        } else {
            $this->update_time = $now;
        }
        return true;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'          => Yii::t('model','AdId'),
			'position_id' => Yii::t('model','AdPosition'),
			'title'       => Yii::t('model','AdTitle'),
			'title_alias' => Yii::t('model','AdTitleAlias'),
			'link_url'    => Yii::t('model','AdLinkUrl'),
			'image_url'   => Yii::t('model','AdImageUrl'),
			'width'       => Yii::t('model','AdWidth'),
			'height'      => Yii::t('model','AdHeight'),
			'introduce'   => Yii::t('model','AdIntroduce'),
			'attach_file' => Yii::t('model','AdAttachFile'),
			'sort_order'  => Yii::t('model','AdSortOrder'),
			'status'      => Yii::t('model','AdStatus'),
			'create_time' => Yii::t('model','AdCreateTime'),
			'update_time' => Yii::t('model','AdUpdateTime'),
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

		$criteria->compare('id',$this->id,true);

		$criteria->compare('position_id',$this->position_id,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('title_alias',$this->title_alias,true);

		$criteria->compare('link_url',$this->link_url,true);

		$criteria->compare('image_url',$this->image_url,true);

		$criteria->compare('width',$this->width);

		$criteria->compare('height',$this->height);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider('Ad', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Ad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
	 * 获取一条广告
	 * @param number $position_id
	 * @param string $order
	 * @return array()
	 */
	public static function getAdOne($position_id = 0, $order=''){
		$data = array();
		if($position_id){
			$order or $order='id DESC';
			$data = self::model()->find(array(
					'select'=>array('id', 'title', 'link_url', 'image_url', 'width', 'height', 'attach_file'),
					'order' =>$order,
					'condition'=>'position_id = :pid AND status = :status', 
					'params'=>array(':pid'=>$position_id, ':status'=>'Y')
					)
			);
		}
		return $data;
	}
}