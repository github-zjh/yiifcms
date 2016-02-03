<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $uid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $groupid
 * @property integer $status
 * @property integer $addtime
 * @property string $avatar
 * @property string $nickname
 * @property string $sign
 * @property string $web
 * @property string $mobile
 * @property string $qq
 * @property string $register_ip
 * @property string $last_login_ip
 * @property string $logins
 * @property string $username_editable
 */
class User extends CActiveRecord
{
    const STATUS_NORMAL  = 1;    //状态正常
    const STATUS_AUDIT   = -1;   //状态待审核
    const STATUS_DISABLE = 0;    //状态禁用
    const AdminGroupID   = 10;   //管理员用户组id
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required','on'=>'create, register'),
            array('username', 'unique'),
			array('username', 'required','on'=>'bind_register'),			
			array('username, password, email, avatar, sign, web', 'length', 'max'=>100),
            array('password', 'length', 'min' => 6),
			array('groupid, logins', 'length', 'max'=>10),				
			array('nickname', 'length', 'max'=>50),
			array('email','unique'),
			array('nickname', 'unique', 'on'=>'update'),
			array('web','checkWeb', 'on'=>'update'),
			array('qq','length', 'min'=>6, 'on'=>'update'),
			array('mobile, qq', 'length', 'max'=>11, 'on'=>'update'),
			array('qq, status, addtime', 'numerical', 'integerOnly'=>true),
			array('mobile','checkMobile', 'on'=>'update'),
			array('register_ip, last_login_ip', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, password, email, groupid, status, addtime, avatar, nickname, sign, web, mobile, qq, register_ip, last_login_ip, logins, username_editable', 'safe', 'on'=>'search'),
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
            'group' => array(self::BELONGS_TO, 'UserGroup', 'groupid')
		);
	}
	
	/**
	 * 校验个人网址
	 */
	public function checkWeb(){
		$reg = '/^http[s]?:\/\/[a-z\d]+[\.][a-z\d]+[\.](com|net|cn|org|com\.cn)(\/?)$/';
		if($this->web && !preg_match($reg, $this->web)){
			$this->addError('web', Yii::t('common','Web Is Invalid'));
			return false;
		}
	}
	
	/**
	 * 校验手机号码
	 */
	public function checkMobile(){
		$reg = '/^1[3|5|8]\d{9}$/';
		if($this->mobile && !preg_match($reg, $this->mobile)){
			$this->addError('mobile', Yii::t('common','Mobile Is Invalid'));
			return false;
		}
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(		
			'uid'               => Yii::t('model','uid'),
			'username'          => Yii::t('model','username'),
			'password'          => Yii::t('model','password'),
			'email'             => Yii::t('model','email'),
			'groupid'           => Yii::t('model','groupid'),
			'status'            => Yii::t('model','status'),
			'addtime'           => Yii::t('model','addtime'),
			'avatar'            => Yii::t('model','avatar'),
			'nickname'          => Yii::t('model','nickname'),
			'sign'              => Yii::t('model','sign'),
			'web'               => Yii::t('model','web'),
			'mobile'            => Yii::t('model','mobile'),
			'qq'                => Yii::t('model','qq'),
			'register_ip'       => Yii::t('model','register_ip'),
			'last_login_ip'     => Yii::t('model','last_login_ip'),
			'logins'            => Yii::t('model','logins'),
			'username_editable' => Yii::t('model','username_editable'),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * 数据保存前处理
	 * @return boolean.
	 */
	protected function beforeSave ()
	{
		if ($this->isNewRecord) {
			if($this->groupid <= 0)
			{
				$this->addError('groupid',Yii::t('admin','Group Is Required'));
				return false;
			}
			$this->password = $this->createPassword($this->password);
			$this->addtime = time();
		} else {
			//自己不能禁用自己  和 修改自己的权限
			if(!Yii::app()->user->getIsGuest() && $this->uid == Yii::app()->user->id) {
				if(in_array($this->status, array(self::STATUS_AUDIT, self::STATUS_DISABLE))) {
					$this->addError('status',Yii::t('admin','You Can Not Change Yourself'));
					return false;
				}
				if($this->groupid != Yii::app()->user->groupid) {
					$this->addError('status',Yii::t('admin','You Can Not Change Your Group'));
					return false;
				}
			}

		}
        //低权限用户不能修改高权限用户
        if(!Yii::app()->user->getIsGuest() && $this->groupid > Yii::app()->user->groupid) {
            $this->addError('status',Yii::t('admin','You Can Not Change The User Group'));
            return false;
        } 
		return true;
	}
	/**
	 * 生成密码
	 * @return string
	 */
	public static function createPassword($password=''){
		
		//判断加密方式
		$settings = Setting::model()->find('scope = :scope AND variable = :variable', array(':scope'=>'base', ':variable'=>'encrypt'));
		switch($settings->value){
			case 'md5':
				$pwd = md5($password);
				break;
			case 'crypt':
				$pwd = CPasswordHelper::hashPassword($password, 8);
				break;
			default:
				throw new CHttpException(500, 'Unknown Encrypt Method!');				
		}
		return $pwd;
	}
	
	/**
	 * 检测用户密码
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	public function validatePassword($password = ''){		
		$return = false;
		//判断加密方式
		$settings = Setting::model()->find('scope = :scope AND variable = :variable', array(':scope'=>'base', ':variable'=>'encrypt'));
		switch($settings->value){
			case 'md5':
				if(strcmp(md5($password), $this->password) == 0){
					$return = true;	
				}			
				break;
			case 'crypt':
				$return = CPasswordHelper::verifyPassword($password, $this->password);
				break;
			default:
				throw new CHttpException(500, 'Unknown Encrypt Method!');				
		}
		return $return;
	}
}
