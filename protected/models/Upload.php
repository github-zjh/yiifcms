<?php

/**
 * This is the model class for table "{{upload}}".
 *
 * The followings are the available columns in table '{{upload}}':
 * @property string $id
 * @property string $user_id
 * @property string $real_name
 * @property string $file_name
 * @property string $thumb_name
 * @property string $file_ext
 * @property string $file_mime
 * @property string $file_size
 * @property string $down_count
 * @property string $create_time
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{upload}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, file_size, down_count, create_time', 'length', 'max'=>10),
			array('real_name, thumb_name', 'length', 'max'=>255),
			array('file_name', 'length', 'max'=>100),
			array('file_ext', 'length', 'max'=>5),
			array('file_mime', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, real_name, file_name, thumb_name, file_ext, file_mime, file_size, down_count, create_time', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'real_name' => 'Real Name',
			'file_name' => 'File Name',
			'thumb_name' => 'Thumb Name',
			'file_ext' => 'File Ext',
			'file_mime' => 'File Mime',
			'file_size' => 'File Size',
			'down_count' => 'Down Count',
			'create_time' => 'Create Time',
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

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('real_name',$this->real_name,true);

		$criteria->compare('file_name',$this->file_name,true);

		$criteria->compare('thumb_name',$this->thumb_name,true);

		$criteria->compare('file_ext',$this->file_ext,true);

		$criteria->compare('file_mime',$this->file_mime,true);

		$criteria->compare('file_size',$this->file_size,true);

		$criteria->compare('down_count',$this->down_count,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Upload', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}