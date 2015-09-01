<?php

/**
 * This is the model class for table "{{attachment}}".
 *
 * The followings are the available columns in table '{{attachment}}':
 * @property string $id
 * @property string $user_id
 * @property string $real_name
 * @property string $file_name
 * @property string $thumb_name
 * @property string $file_ext
 * @property string $file_size
 * @property string $create_time
 */
class Attachment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{attachment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, file_size, create_time', 'length', 'max'=>10),
			array('real_name, thumb_name', 'length', 'max'=>255),
			array('file_name', 'length', 'max'=>100),
			array('file_ext', 'length', 'max'=>5),			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, real_name, file_name, thumb_name, file_ext, file_size, create_time', 'safe', 'on'=>'search'),
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
			'file_size' => 'File Size',			
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
		
		$criteria->compare('file_size',$this->file_size,true);
        
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Attachment', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Attachment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * 保存附件数据
     * 
     * @param Uploader $uploader
     * @return boolean
     */
    public static function saveData($uploader = NULl)
    {
        if($uploader instanceof Uploader) {
            $att = new Attachment();
            $att->user_id   = Yii::app()->user->id ? Yii::app()->user->id : 0;
            $att->file_ext  = $uploader->file_ext;
            $att->file_name = $uploader->file_path;
            $att->real_name = $uploader->real_name;
            $att->file_size = $uploader->total_size;
            $att->create_time = time();
            $att->save();
        }
        return true;
    }
    /**
     * 删除附件
     * 
     * @param int $id
     * @return boolean
     */
    public static function deleteData($id = 0)
    {
        $attachment = self::model()->findByPk($id);
        if($attachment) {
            Uploader::deleteFile($attachment->file_name);
            Uploader::deleteFile($attachment->thumb_name);
            $attachment->delete();
        }
        return true;
    }
}