<?php

/**
 * This is the model class for table "tbl_admin".
 *
 * The followings are the available columns in table 'tbl_admin':
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $password
 * @property string $sex
 * @property string $personal_name
 * @property string $phone
 * @property string $authority  //0:超级管理员（可管理andmin和student）,1:一级管理员（具备管理student的所有权限）,2:二级管理员（只能创建修改student信息，不能删除），3：普通管理员（只能查看学员信息） 
 */
class Admin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admin the static model class
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
		return 'tbl_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admin_name, password, sex, personal_name, phone, authority', 'required'),
			array('admin_name, password, sex, personal_name, phone, authority', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('admin_id, admin_name, password, sex, personal_name, phone, authority', 'safe', 'on'=>'search'),
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
			'admin_id' => Yii::t('common','admin_id'),
			'admin_name' => Yii::t('common','admin_name'),
			'password' => Yii::t('common','password'),
			'sex' => Yii::t('common','sex'),
			'personal_name' => Yii::t('common','personal_name'),
			'phone' => Yii::t('common','phone'),
			'authority' => Yii::t('common','authority'),
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

		$criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('admin_name',$this->admin_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('personal_name',$this->personal_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('authority',$this->authority,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
                /**
	 * 登录的是否是二级管理员，是否具备读写修改权限
 	 */
        public function isWAdmin() {
            $user = Admin::model()->findByAttributes(array('admin_name'=>Yii::app()->user->name));
            if ($user->authority == 0 || $user->authority == 1 || $user->authority == 2) {
                return TRUE;
            } else {
                return FALSE;            
            }
        }
        /**
	 * 登录的是否是一级管理员管理员，是否具备读写修改删除权限
	 */        
        public function isWDAdmin() {
            $user = Admin::model()->findByAttributes(array('admin_name'=>Yii::app()->user->name));
            if ($user->authority == 0 || $user->authority == 1) {
                return TRUE;
            } else {
                return FALSE;            
            }
        }
         /**
	 * 登录的是否是超级管理员
	 */ 
        public function isSuperAdmin() {
            $user = Admin::model()->findByAttributes(array('admin_name'=>Yii::app()->user->name));
            if ($user->authority == 0) {
                return TRUE;
            } else {
                return FALSE;            
            }
        }
}