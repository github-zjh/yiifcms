<?php

/**
 * This is the model class for table "{{goods}}".
 *
 * The followings are the available columns in table '{{goods}}':
 * @property string $id
 * @property string $goods_name
 * @property string $catalog_id
 * @property string $price
 * @property string $default_image
 * @property string $default_thumb
 * @property string $image_list
 * @property string $content
 * @property string $views
 * @property string $sales
 * @property string $create_time
 * @property string $update_time
 * @property string $status
 * @property integer $recom_id
 * @property integer $sort_order
 */
class Goods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recom_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('goods_name', 'length', 'max'=>100),
			array('catalog_id, price, views, sales, create_time, update_time', 'length', 'max'=>10),
			array('default_image, default_thumb', 'length', 'max'=>200),
			array('image_list', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goods_name, catalog_id, price, default_image, default_thumb, image_list, content, views, sales, create_time, update_time, status, recom_id, sort_order', 'safe', 'on'=>'search'),
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
	        'catalog'=>array(self::BELONGS_TO, 'Catalog', 'catalog_id', 'alias'=>'catalog', 'select'=>'id,catalog_name'),
	    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'goods_name' => 'Goods Name',
			'catalog_id' => 'Catalog',
			'price' => 'Price',
			'default_image' => 'Default Image',
			'default_thumb' => 'Default Thumb',
			'image_list' => 'Image List',
			'content' => 'Content',
			'views' => 'Views',
			'sales' => 'Sales',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'status' => 'Status',
			'recom_id' => 'Recom',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('goods_name',$this->goods_name,true);

		$criteria->compare('catalog_id',$this->catalog_id,true);

		$criteria->compare('price',$this->price,true);

		$criteria->compare('default_image',$this->default_image,true);

		$criteria->compare('default_thumb',$this->default_thumb,true);

		$criteria->compare('image_list',$this->image_list,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('views',$this->views,true);

		$criteria->compare('sales',$this->sales,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('update_time',$this->update_time,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('recom_id',$this->recom_id);

		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider('Goods', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}