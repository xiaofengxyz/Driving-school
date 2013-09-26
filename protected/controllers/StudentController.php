<?php

class StudentController extends Controller
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
        $model = $this->loadModel($id);
        $model_data = new Student; //解决不能正常显示中文
        $sex = array(0 =>Yii::t('common','male'), 1 => Yii::t('common','female'));
        $authortity = array(0 => Yii::t('common','superadmin'), 1 => Yii::t('common','writeDeleteadmin'), 2 => Yii::t('common','writeadmin'), 3 => Yii::t('common','readonlyadmin'));
        $is_yesno = array(0 =>Yii::t('common','no'), 1 => Yii::t('common','yes'));
        foreach ($model as $key => $value) {
            if ($key == 'sex' && is_numeric($value)) {
                $model_data->$key = $sex[$value];
            } elseif ($key == 'authority' && is_numeric($value)) {
                $model_data->$key = $authortity[$value];
            } elseif ($this->filterView($key)) {
                $model_data->$key = $is_yesno[$value];
            } else {
                $model_data->$key = $value;
            }
        }
		$this->render('view',array(
			'model'=>$model_data,
		));
	}

    public function filterView($key) {
        if($key == 'is_residence' || $key == 'is_pickup' || $key == 'is_submit' || $key == 'is_add_car') 
            return TRUE;
        return FALSE;
    }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Student;
//                $model_student_score = new Studentscore;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
//            $model_student_score->personal_id = $model->personal_id;
            $model_has = Student::model()->findByAttributes(array('personal_id'=>$model->personal_id));
            if(isset($model_has)) {
                throw new CHttpException(404,'The peopele has existed.');
            }  
            $model_has = Student::model()->findByAttributes(array('stdudent_id'=>$model->stdudent_id));
            if(isset($model_has)) {
                throw new CHttpException(404,'The student id has existed.');
            } 
			if($model->save()) {
                //不再同时创建成绩单
//                $model_student_score->record_id = $model->record_id;
//                if ($model_student_score->save())
//                    $this->redirect(array('view','id'=>$model->record_id));
//                else {
//                    $model->delete();
//                }
                $this->redirect(array('view','id'=>$model->record_id));
            }
                
				
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

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->record_id));
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
        // TODO:: 需要同时删除此学员所有的成绩
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
//		$dataProvider=new CActiveDataProvider('Student');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
        
        $model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
//		$model=new Student('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Student']))
//			$model->attributes=$_GET['Student'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
        
        $dataProvider=new CActiveDataProvider('Student');
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Student the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Student $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    
     /**
	 * Get the Menu of page.
	 * 
	 */
        /**
	 * Get the Menu of Index page.
	 * 
	 */
    public function getIndexMenu(){
        $menu_content = array();
        $index_admin = $this->createUrl('admin/index');
        $list_admin = $this->createUrl('admin/list');
        $create_admin = $this->createUrl('admin/create');
        $manage_admin = $this->createUrl('admin/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');

        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(                   
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),
//                    array('label'=>'Update Admin', 'url'=>array('Update')),
//                    array('label'=>'Delete Admin', 'url'=>array('Delete')),
//                    array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),

                array('label'=>Yii::t('common','Admins Home'), 'url'=>$index_admin),
                array('label'=>Yii::t('common','List Admins'), 'url'=>$list_admin),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_admin),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_admin),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
//                    array('label'=>Yii::t('common','Update Student'), 'url'=>array('admin')),
//                    array('label'=>Yii::t('common','Delete Student'), 'url'=>array('Delete')),
//                    array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),
            );
        } else {
            $menu_content = array();                
        }

        return $menu_content;
    }
        
        /**
	 * Get the Menu of Create page.
	 * 
	 */
    public function getCreateMenu(){
        $menu_content = array();
        $index_admin = $this->createUrl('admin/index');
        $list_admin = $this->createUrl('admin/list');
        $create_admin = $this->createUrl('admin/create');
        $manage_admin = $this->createUrl('admin/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');

        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(                   
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
//                    array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
//                    array('label'=>Yii::t('common','Update Student'), 'url'=>array('Update')),
//                    array('label'=>Yii::t('common','Delete Student'), 'url'=>array('Delete')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),

                array('label'=>Yii::t('common','Admins Home'), 'url'=>$index_admin),
                array('label'=>Yii::t('common','List Admins'), 'url'=>$list_admin),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_admin),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_admin),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
//                    array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
//                    array('label'=>Yii::t('common','Update Student'), 'url'=>array('admin')),
//                    array('label'=>Yii::t('common','Delete Student'), 'url'=>array('Delete')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),
            );
        }elseif (Admin::model()->isWAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
//                    array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
            );
        }else {
            $menu_content = array();                
        }

        return $menu_content;
    }
        
        /**
	 * Get the Menu of Manage page.
	 * 
	 */
    public function getManageMenu(){
        $menu_content = array();
        $index_admin = $this->createUrl('admin/index');
        $list_admin = $this->createUrl('admin/list');
        $create_admin = $this->createUrl('admin/create');
        $manage_admin = $this->createUrl('admin/admin');
        $backup_info = $this->createUrl('backup/BackupToExel');

        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(                   
//                    array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
//                    array('label'=>Yii::t('common','Update Student'), 'url'=>array('Update')),
//                    array('label'=>Yii::t('common','Delete Student'), 'url'=>array('Delete')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),

                array('label'=>Yii::t('common','Admins Home'), 'url'=>$index_admin),
                array('label'=>Yii::t('common','List Admins'), 'url'=>$list_admin),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_admin),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_admin),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
//                    array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
//                    array('label'=>Yii::t('common','Update Student'), 'url'=>array('admin')),
//                    array('label'=>'Delete Students', 'url'=>array('Delete')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),
            );
        }elseif (Admin::model()->isWAdmin()) {
            $menu_content = array(
//                    array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
            );
        }  else {
            $menu_content = array();                
        }

        return $menu_content;
    }

        
        /**
	 * Get the Menu of Update page.
	 * 
	 */
    public function getUpdateMenu($id){
        $menu_content = array();
        $index_admin = $this->createUrl('admin/index');
        $list_admin = $this->createUrl('admin/list');
        $create_admin = $this->createUrl('admin/create');
        $manage_admin = $this->createUrl('admin/admin');

        $create_student_score = $this->createUrl('studentscore/create',array('id'=>$id));
        $student_score = $this->createUrl('studentscore/view',array('id'=>$id));
        $backup_info = $this->createUrl('backup/BackupToExel');

        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(                   
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','View Student'), 'url'=>array('view', 'id'=>$id)),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),

                array('label'=>Yii::t('common','Create Studentscore'), 'url'=>$create_student_score),
                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),

                array('label'=>Yii::t('common','Admins Home'), 'url'=>$index_admin),
                array('label'=>Yii::t('common','List Admins'), 'url'=>$list_admin),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_admin),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_admin),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','View Student'), 'url'=>array('view', 'id'=>$id)),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),

                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
            );
        }elseif (Admin::model()->isWAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','View Student'), 'url'=>array('view', 'id'=>$id)),

                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
            );
        }  else {
            $menu_content = array();                
        }

        return $menu_content;
    }
        
        
     /**
	 * Get the Menu of View page.
	 * 
	 */
    public function getViewMenu($id){
        $menu_content = array();
        $index_admin = $this->createUrl('admin/index');
        $list_admin = $this->createUrl('admin/list');
        $create_admin = $this->createUrl('admin/create');
        $manage_admin = $this->createUrl('admin/admin');

        $create_student_score = $this->createUrl('studentscore/create',array('id'=>$id));
        $student_score = $this->createUrl('studentscore/view',array('id'=>$id));
        $backup_info = $this->createUrl('backup/BackupToExel');

        if (Admin::model()->isSuperAdmin()) {
            $menu_content = array(                   
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','Update Student'), 'url'=>array('update', 'id'=>$id)),
                array('label'=>Yii::t('common','Delete Student'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),

                array('label'=>Yii::t('common','Create Studentscore'), 'url'=>$create_student_score),
                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
                array('label'=>Yii::t('common','Backup StudentInfo'), 'url'=>$backup_info),

                array('label'=>Yii::t('common','Admins Home'), 'url'=>$index_admin),
                array('label'=>Yii::t('common','List Admins'), 'url'=>$list_admin),
                array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_admin),
                array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_admin),
            ); 
        }elseif (Admin::model()->isWDAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','Update Student'), 'url'=>array('update', 'id'=>$id)),
                array('label'=>Yii::t('common','Delete Student'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>Yii::t('common','Manage Students'), 'url'=>array('admin')),

                array('label'=>Yii::t('common','Create Studentscore'), 'url'=>$create_student_score),
                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
            );
        }elseif (Admin::model()->isWAdmin()) {
            $menu_content = array(
                array('label'=>Yii::t('common','List Students'), 'url'=>array('index')),
                array('label'=>Yii::t('common','Create Student'), 'url'=>array('create')),
                array('label'=>Yii::t('common','Update Student'), 'url'=>array('update', 'id'=>$id)),

                array('label'=>Yii::t('common','Create Studentscore'), 'url'=>$create_student_score),
                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
            );
        }  else {
            $menu_content = array(
                array('label'=>Yii::t('common','View Studentscore'), 'url'=>$student_score),
            );                
        }

        return $menu_content;
    }
}
