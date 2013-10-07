<?php

class AdminController extends Controller
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
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index'),
				'users'=>array('@'),
			),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view','list','create','update','admin','delete'),
//				'users'=>array('admin'),
                'expression'=>'yii::app()->admin->isSuperAdmin()',//具有超级管理员才可以
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
        $model = $this->loadModel($id);
        $model_data = new Admin;
        $sex = array(0 =>Yii::t('common','male'), 1 => Yii::t('common','female'));
        $authortity = array(0 => Yii::t('common','superadmin'), 1 => Yii::t('common','writeDeleteadmin'), 2 => Yii::t('common','writeadmin'), 3 => Yii::t('common','readonlyadmin'));
        
        foreach ($model as $key => $value) {
            if ($key == 'sex' && is_numeric($value)) {
                $model_data->$key = $sex[$value];
            } elseif ($key == 'authority' && is_numeric($value)) {
                $model_data->$key = $authortity[$value];
            } else {
                $model_data->$key = $value;
            }
        }
		$this->render('view',array(
			'model'=>$model_data,
		));
	}

    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Admin;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Admin']))
		{
			$model->attributes=$_POST['Admin'];
            $model_has = Admin::model()->findByAttributes(array('admin_name'=>$model->admin_name));
            if(isset($model_has)) {
                throw new CHttpException(404,Yii::t('common','The peopele has existed.'));
            }
			if($model->save())
				$this->redirect(array('view','id'=>$model->admin_id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Admin']))
		{
			$model->attributes=$_POST['Admin'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->admin_id));
		}

		$this->render('update',array(
			'model'=>$model,
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
	 * Index.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Admin');
		$this->render('index');
	}
        
	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$dataProvider=new CActiveDataProvider('Admin');
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Admin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Admin']))
			$model->attributes=$_GET['Admin'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Admin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Admin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Admin $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
	 * Get the menu.
	 */
    public function getIndexMenu(){
//            $student = Admin::model()->findByAttributes(array('admin_name'=>Yii::app()->student->name));
        $menu_content = array();
        $list_student = $this->createUrl('student/index');
        $create_student = $this->createUrl('student/create');
        $manage_student = $this->createUrl('student/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');
        $update_sites = $this->createUrl('site/update');
        $view_sites = $this->createUrl('site/view');
        
        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
                array('label'=>Yii::t('common','Create Student'), 'url'=>$create_student),
//                    array('label'=>'Update Student', 'url'=>array('admin')),
//                    array('label'=>'Delete Student', 'url'=>array('Delete')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>$manage_student),
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),
                array('label'=>'------------------------------'),

                array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),
//                    array('label'=>'Update Admin', 'url'=>array('Update')),
//                    array('label'=>'Delete Admin', 'url'=>array('Delete')),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
                array('label'=>'------------------------------'),
                
                array('label'=>Yii::t('common','Update Site Desc'), 'url'=>$update_sites),
                array('label'=>Yii::t('common','View Site Desc'), 'url'=>$view_sites),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
                array('label'=>Yii::t('common','Create Student'), 'url'=>$create_student),
//                    array('label'=>'Update Student', 'url'=>array('admin')),
//                    array('label'=>'Delete Student', 'url'=>array('Delete')),
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

    public function getStudentsMenu(){
        $menu_content = array();
        $list_student = $this->createUrl('student/index');
        $create_student = $this->createUrl('student/create');
        $manage_student = $this->createUrl('student/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');
        $menu_content = array(
            array('label'=>Yii::t('common','List Students'), 'url'=>$list_student),
            array('label'=>Yii::t('common','Create Student'), 'url'=>$create_student),
            array('label'=>Yii::t('common','Manage Students'), 'url'=>$manage_student),
            array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),
            array('label'=>'------------------------------'),
        );
        return $menu_content;
    }
    
    public function getSiteMenu(){
        $menu_content = array();
        $update_sites = $this->createUrl('site/update');
        $view_sites = $this->createUrl('site/view');
        $menu_content = array(
            array('label'=>'------------------------------'),
            array('label'=>Yii::t('common','Update Site Desc'), 'url'=>$update_sites),
            array('label'=>Yii::t('common','View Site Desc'), 'url'=>$view_sites),
        );
        return $menu_content;
    }
//    public function getSexDropOptions($sex) {
//        
//        if ($sex == 0) {
//            echo $sex;
//            return array(1 => 'male', 2 => 'female');
//        } else {
//            return array(1 => 'female', 2 => 'male');
//        }
//    }
//    public function getAuthorityDropOptions($authority) {
//        if ($authority == 0) {
//            return array(1 => 'superadmin', 2 => 'writeadmin', 3 => 'readonlyadmin');
//        } elseif ($authority == 1) { 
//            return array(1 => 'writeadmin', 2 => 'superadmin', 3 => 'readonlyadmin');
//        } else {
//            return array(1 => 'readonlyadmin', 2 => 'superadmin', 3 => 'writeadmin');
//        }
//    }
    
}
