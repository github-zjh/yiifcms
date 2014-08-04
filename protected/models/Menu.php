<?php

/**
 * This is the model class for table "{{Menu}}".
 *
 * The followings are the available columns in table '{{Menu}}':
 * @property string $id
 * @property string $menu_name
 * @property string $menu_link
 * @property string $unique
 * @property string $status_is
 * @property string $parent_id
 * @property string $sort_order
 * @property string $target
 */
class Menu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_name', 'length', 'max'=>30),
			array('menu_link', 'length', 'max'=>50),
			array('unique', 'length', 'max'=>20),
			array('status_is, target', 'length', 'max'=>1),
			array('parent_id, sort_order', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_name, menu_link, status_is, parent_id, sort_order, target', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model','menu_id'),
			'menu_name' => Yii::t('model','menu_name'),
			'menu_link' => Yii::t('model','menu_link'),
			'unique' => Yii::t('model','menu_unique'),
			'status_is' => Yii::t('model','status_is'),
			'parent_id' => Yii::t('model','parent_id'),
			'sort_order' => Yii::t('model','menu_sort_order'),
			'target' => Yii::t('model','new_open')
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

		$criteria->compare('menu_name',$this->menu_name,true);

		$criteria->compare('menu_link',$this->menu_link,true);
		
		$criteria->compare('unique',$this->unique,true);

		$criteria->compare('status_is',$this->status_is,true);

		$criteria->compare('parent_id',$this->parent_id,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('target',$this->target,true);

		return new CActiveDataProvider('Menu', array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * 父级分类不能和本分类相同
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CActiveRecord::beforeSave()
	 */
	public function beforeSave(){
		if(!$this->isNewRecord){
			if($this->id == $this->parent_id){
				$this->addError('parent_id', Yii::t('admin','Parent ID can not eque itself ID'));
				return false;
			}
		}
		return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * 所有导航菜单
	 * @param number $parentid
	 * @param unknown $array
	 * @param number $level
	 * @param number $add
	 * @param string $repeat
	 * @return Ambigous <multitype:, multitype:multitype:number unknown string  >
	 */
	static public function get($parentid = 0, $array = array(), $level = 0, $add = 2, $repeat = '&nbsp;&nbsp;') {
	
		$str_repeat = '';
		if ($level) {
			for($j = 0; $j < $level; $j ++) {
				$str_repeat .= $repeat;
			}
		}
		$newarray = array ();
		$temparray = array ();
		foreach ( ( array ) $array as $v ) {
			if ($v ['parent_id'] == $parentid) {
				$newarray [] = array ('id' => $v ['id'], 'menu_name' => $v ['menu_name'], 'menu_link' => $v ['menu_link'], 'unique' => $v ['unique'], 'parent_id' => $v ['parent_id'], 'level' => $level, 'sort_order' => $v ['sort_order'],'status_is' => $v ['status_is'], 'target'=>$v['target'], 'str_repeat' => $str_repeat);
	
				$temparray = self::get ( $v ['id'], $array, ($level + $add) );
				if ($temparray) {
					$newarray = array_merge ( $newarray, $temparray );
				}
			}
		}
		return $newarray;
	}
	
}