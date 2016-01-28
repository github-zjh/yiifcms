<?php

/**
 * This is the model class for table "{{spider_setting}}".
 *
 * The followings are the available columns in table '{{spider_setting}}':
 * @property integer $id
 * @property string $site
 * @property string $url
 * @property string $list_charset
 * @property string $content_charset
 * @property string $item_rule_li
 * @property string $item_rule_a
 * @property string $content_rule
 * @property string $filter_rule
 * @property string $page_rule
 * @property integer $cur_page
 * @property integer $total_page
 * @property integer $type
 * @property string $soft_icon_rule
 * @property string $video_cover_rule
 */
class SpiderSetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{spider_setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('site, url, item_rule_li, item_rule_a, cur_page, total_page', 'required'),
			array('cur_page, total_page, type', 'numerical', 'integerOnly'=>true),
			array('site, url, item_rule_li, item_rule_a, content_rule', 'length', 'max'=>100),
			array('list_charset, content_charset', 'length', 'max'=>6),
			array('page_rule', 'length', 'max'=>100),
            array('filter_rule, soft_icon_rule, video_cover_rule', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, site, url, list_charset, content_charset, item_rule_li, item_rule_a, content_rule, page_rule, cur_page, total_page, type', 'safe', 'on'=>'search'),
		);
	}
    
    public function beforeSave()
    {
        if($this->cur_page > $this->total_page) {
            $this->addError('cur_page', Yii::t('admin', 'CurPage Must Be Less Than TotalPage'));
            return false;
        }
        return true;
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
			'id'              => Yii::t('model', 'SpiderSettingId'),
			'site'            => Yii::t('model', 'SpiderSettingSite'),
			'url'             => Yii::t('model', 'SpiderSettingUrl'),
			'list_charset'    => Yii::t('model', 'SpiderSettingListCharset'),
			'content_charset' => Yii::t('model', 'SpiderSettingContentCharset'),
			'item_rule_li'    => Yii::t('model', 'SpiderSettingItemRuleLi'),
			'item_rule_a'     => Yii::t('model', 'SpiderSettingItemRuleA'),
			'content_rule'    => Yii::t('model', 'SpiderSettingContentRule'),
			'page_rule'       => Yii::t('model', 'SpiderSettingPageRule'),
			'cur_page'        => Yii::t('model', 'SpiderSettingCurPage'),
			'total_page'      => Yii::t('model', 'SpiderSettingTotalPage'),
			'type'            => Yii::t('model', 'SpiderSettingType'),
            'filter_rule'     => Yii::t('model', 'SpiderSettingFilterRule'),
            'soft_icon_rule'  => Yii::t('model', 'SpiderSettingSoftIconRule'),
            'video_cover_rule'=> Yii::t('model', 'SpiderSettingVideoCoverRule'),
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

		$criteria->compare('site',$this->site,true);

		$criteria->compare('url',$this->url,true);

		$criteria->compare('list_charset',$this->list_charset,true);

		$criteria->compare('content_charset',$this->content_charset,true);

		$criteria->compare('item_rule_li',$this->item_rule_li,true);

		$criteria->compare('item_rule_a',$this->item_rule_a,true);

		$criteria->compare('content_rule',$this->content_rule,true);

		$criteria->compare('page_rule',$this->page_rule,true);

		$criteria->compare('cur_page',$this->cur_page);

		$criteria->compare('total_page',$this->total_page);

		$criteria->compare('type',$this->type);
        
        $criteria->compare('filter_rule',$this->filter_rule,true);

		return new CActiveDataProvider('SpiderSetting', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return SpiderSetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}