<?php

class StudentscoreController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
//        $model_data = array();
        $model = Studentscore::model()->findAllByAttributes(array('record_id'=>$id));
 
        $model_array = null;
        $is_yesno = array(0 =>Yii::t('common','no'), 1 => Yii::t('common','yes'));
//        $index = 0;
        foreach ($model as $index => $arrayval) {
            $model_data = new Studentscore; //解决不能正常显示中文
            foreach ($arrayval as $key => $value) {
                if ($key == 'is_qualified' && is_numeric($value)) {
                    $model_data->$key = $is_yesno[$value];
                } else {
                    $model_data->$key = $value;
                }
            }
            $model_array[$index] = $model_data; //index为数字索引，不能用$model_array->index
            $index++;
        }
        if (!isset($model_array))
            throw new CHttpException(404,'The score has not existed.');
		$this->render('view',array(
			'model'=>$model_array,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new Studentscore;
        $model->record_id = $id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Studentscore']))
		{
			$model->attributes=$_POST['Studentscore'];
            $model_has = Studentscore::model()->findByPk(array('record_id' => $id, 'course' => $model->course, 'times' => $model->times));
            if(isset($model_has)) {
                throw new CHttpException(404,'The score has existed.');
            }
            $model_student = Student::model()->findByPk($id);
            $model['personal_id'] = $model_student->personal_id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->record_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
//		$model=$this->loadModel($id);
        $model_data = Studentscore::model()->findAllByAttributes(array('record_id'=>$id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Studentscore']))
		{
            $model_data = new Studentscore;
            
			$model_data->attributes=$_POST['Studentscore'];
//            $model_data->record_id = $id;
            $model = Studentscore::model()->findByPk(array('record_id' => $id, 'course' => $model_data->course, 'times' => $model_data->times));
            $model->attributes = $model_data->attributes;
//            if ($model->save())
//                    $this->redirect(array('view','id'=>$id));
            $model_student = Student::model()->findByPk($id);
            $model['personal_id'] = $model_student->personal_id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->record_id));
		}
        if (!isset($model_data))
            throw new CHttpException(404,'There is a mistake.');
        
		$this->render('update',array(
			'model'=>$model_data,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Studentscore');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Studentscore('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Studentscore']))
			$model->attributes=$_GET['Studentscore'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Studentscore the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Studentscore::model()->findAllByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Studentscore $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='studentscore-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    /**
	 * Get the Menu of page.
	 * 
	 */
    public function getStudentsMenu(){
//            $student = Admin::model()->findByAttributes(array('admin_name'=>Yii::app()->student->name));
        $menu_content = array();
        $list_student = $this->createUrl('student/index');
        $create_student = $this->createUrl('student/create');
        $manage_student = $this->createUrl('student/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');
        
        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
                array('label'=>Yii::t('common','Create Student'), 'url'=>$create_student),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>$manage_student),
                
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
                array('label'=>Yii::t('common','Create Student'), 'url'=>$create_student),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>$manage_student),
            );
        }elseif (Admin::model()->isWAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
                array('label'=>Yii::t('common','Create Student'), 'url'=>$create_student),
            );
        }  else {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
            );                
        }

        return $menu_content;
    }
    
    public function getAdminsMenu(){
            
        $menu_content = array();

        $list_admin = $this->createUrl('admin/list');
        $create_admin = $this->createUrl('admin/create');
        $manage_admin = $this->createUrl('admin/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');
        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(
                
                array('label'=>Yii::t('common','List Admins'), 'url'=>$list_admin),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_admin),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_admin),
            ); 
        }

        return $menu_content;
    }
}
