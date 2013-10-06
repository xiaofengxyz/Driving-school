<?php

/**
 * This is the model class for table "tbl_site".
 *
 * The followings are the available columns in table 'tbl_site':
 * @property integer $id
 * @property string $site_desc
 * @property string $contact_qq
 * @property string $contact_phone
 * @property string $contact_telephone
 * @property string $contact_eroll_address
 * @property string $contact_school_address
 */
class Site extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Site the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_site';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site_desc, contact_qq, contact_phone, contact_telephone, contact_eroll_address, contact_school_address', 'required'),
			array('site_desc', 'length', 'max'=>1000),
			array('contact_qq, contact_phone, contact_telephone', 'length', 'max'=>50),
			array('contact_eroll_address', 'length', 'max'=>200),
            array('contact_school_address', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
//			array('site_desc, contact_qq, contact_phone, contact_telephone, contact_eroll_address, contact_school_address', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'site_desc' => Yii::t('common','site_desc'),
			'contact_qq' => Yii::t('common','contact_qq'),
			'contact_phone' => Yii::t('common','contact_phone'),
			'contact_telephone' => Yii::t('common','contact_telephone'),
			'contact_eroll_address' => Yii::t('common','contact_eroll_address'),
			'contact_school_address' => Yii::t('common','contact_school_address'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('site_desc',$this->site_desc,true);
		$criteria->compare('contact_qq',$this->contact_qq,true);
		$criteria->compare('contact_phone',$this->contact_phone,true);
		$criteria->compare('contact_telephone',$this->contact_telephone,true);
		$criteria->compare('contact_eroll_address',$this->contact_eroll_address,true);
		$criteria->compare('contact_school_address',$this->contact_school_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}