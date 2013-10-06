<?php

/**
 * This is the model class for table "tbl_studentscore".
 *
 * The followings are the available columns in table 'tbl_studentscore':
 * @property integer $record_id
 * @property string $personal_id
 * @property integer $score
 * @property integer $course
 * @property integer $times
 * @property integer $is_qualified
 * @property string $qualified_date

 */
class Studentscore extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Studentscore the static model class
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
		return 'tbl_studentscore';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course, times, qualified_date', 'required'),
			array('score, course, times, is_qualified', 'numerical', 'integerOnly'=>true),
			array('personal_id', 'length', 'max'=>18, 'min'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('record_id, personal_id, score, course, times, is_qualified, qualified_date', 'safe', 'on'=>'search'),
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
			'personal_id' => Yii::t('common','personal_id'),
			'score' => Yii::t('common','score'),
			'course' => Yii::t('common','course'),
			'times' => Yii::t('common','times'),
			'is_qualified' => Yii::t('common','is_qualified'),
            'qualified_date' => Yii::t('common','qualified_date'),
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
		$criteria->compare('personal_id',$this->personal_id,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('course',$this->course);
		$criteria->compare('times',$this->times);
		$criteria->compare('is_qualified',$this->is_qualified);
		$criteria->compare('qualified_date',$this->qualified_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}