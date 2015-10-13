<?php

/**
 * This is the model class for table "{{user_group}}".
 *
 * The followings are the available columns in table '{{user_group}}':
 * @property string $id
 * @property string $group_name
 * @property string $acl
 */
class UserGroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_group}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('group_name', 'required'),            
			array('group_name', 'length', 'max'=>30),
            array('group_name', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_name, acl', 'safe', 'on'=>'search'),
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
        if(is_array($this->acl)) {
            $unique_acl = array_unique($this->acl);
            $unique_acl && $this->acl = implode(',', $unique_acl);        
        }
        return true;
    }    

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model', 'UserGroupId'),
			'group_name' => Yii::t('model', 'UserGroupName'),
			'acl' => Yii::t('model', 'UserGroupAcl'),
		);
	}

	
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserGroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
