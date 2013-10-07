<?php

/**
 * This is the model class for table "tbl_student".
 *
 * The followings are the available columns in table 'tbl_student':
 * @property integer $record_id
 * @property string $username
 * @property integer $sex
 * @property integer $apply_car_type
 * @property string $personal_id
 * @property string $stdudent_id
 * @property string $phone
 * @property integer $is_residence
 * @property string $address
 * @property string $enroll_date
 * @property string $record_date
 * @property integer $is_pickup
 * @property string $pickup_date
 * @property integer $is_submit
 * @property string $submit_date
 * @property integer $is_add_car
 * @property string $origin_car_type
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return 'tbl_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, sex, apply_car_type, personal_id, , phone, is_residence, address, enroll_date, record_date, is_pickup, pickup_date, is_submit, submit_date, is_add_car', 'required'),
			array('sex, apply_car_type, is_residence, is_pickup, is_submit, is_add_car', 'numerical', 'integerOnly'=>true),
			array('username, apply_car_type, stdudent_id, address, origin_car_type', 'length', 'max'=>128),
            array('personal_id', 'length', 'max'=>18, 'min'=>18),
            array('phone', 'length', 'max'=>11, 'min'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('record_id, username, sex, apply_car_type, personal_id, stdudent_id, phone, is_residence, address, enroll_date, record_date, is_pickup, pickup_date, is_submit, submit_date, is_add_car, origin_car_type', 'safe', 'on'=>'search'),
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
			'record_id' => Yii::t('common','record_id'),
			'username' => Yii::t('common','username'),
			'sex' => Yii::t('common','sex'),
			'apply_car_type' => Yii::t('common','apply_car_type'),
			'personal_id' => Yii::t('common','personal_id'),
			'stdudent_id' => Yii::t('common','stdudent_id'),
			'phone' => Yii::t('common','phone'),
			'is_residence' => Yii::t('common','is_residence'),
			'address' => Yii::t('common','address'),
			'enroll_date' => Yii::t('common','enroll_date'),
			'record_date' => Yii::t('common','record_date'),
			'is_pickup' => Yii::t('common','is_pickup'),
			'pickup_date' => Yii::t('common','pickup_date'),
			'is_submit' => Yii::t('common','is_submit'),
			'submit_date' => Yii::t('common','submit_date'),
			'is_add_car' => Yii::t('common','is_add_car'),
			'origin_car_type' => Yii::t('common','origin_car_type'),
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

		$criteria->compare('record_id',$this->record_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('apply_car_type',$this->apply_car_type,true);
		$criteria->compare('personal_id',$this->personal_id,true);
		$criteria->compare('stdudent_id',$this->stdudent_id,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('is_residence',$this->is_residence);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('enroll_date',$this->enroll_date,true);
		$criteria->compare('record_date',$this->record_date,true);
		$criteria->compare('is_pickup',$this->is_pickup);
		$criteria->compare('pickup_date',$this->pickup_date,true);
		$criteria->compare('is_submit',$this->is_submit);
		$criteria->compare('submit_date',$this->submit_date,true);
		$criteria->compare('is_add_car',$this->is_add_car);
		$criteria->compare('origin_car_type',$this->origin_car_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getCarType($data) {
        $car_type = array(0 => '', 1=> 'A1', 2 => 'B1', 3 => 'C1');
        return $car_type[$data->apply_car_type];
    }
    
    public function getSex($data) {
        $sex = array(0 => Yii::t('common','male'), 1 => Yii::t('common','female'));
        return $sex[$data->sex];
    }
}