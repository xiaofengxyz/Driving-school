<?php

class SiteController extends Controller
{
//        public $user = null;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionAbout($id = 1)
	{
        $model = $this->loadModel($id);
		$this->render('about',array(
			'model'=>$model,
		));
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact($id = 1)
	{
//		$model=new ContactForm;
//		if(isset($_POST['ContactForm']))
//		{
//			$model->attributes=$_POST['ContactForm'];
//			if($model->validate())
//			{
//				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
//				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
//				$headers="From: $name <{$model->email}>\r\n".
//					"Reply-To: {$model->email}\r\n".
//					"MIME-Version: 1.0\r\n".
//					"Content-type: text/plain; charset=UTF-8";
//
//				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
//				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
//				$this->refresh();
//			}
//		}
//		$this->render('contact',array('model'=>$model));
        
        
//		$dataProvider=new CActiveDataProvider('Site');
//		$this->render('view',array(
//			'dataProvider'=>$dataProvider,
//		));
        
        $model = $this->loadModel($id);
		$this->render('contact',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
//				$this->redirect(Yii::app()->user->returnUrl);
                                $url = $this->createUrl('admin/index');
                                $this->redirect($url);
                        }

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

        	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id = 1)
	{
        $model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$model,
		));
	}

    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id = 1)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Site']))
		{
			$model->attributes=$_POST['Site'];
			if($model->save())
				$this->redirect(array('view'));
		}

		$this->render('update',array(
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
	public function loadModel($id = 1)
	{
		$model=Site::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    
    
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
    public function getMenu()
	{
//		$this->user = Yii::app()->user;
        if (Yii::app()->user->isGuest) {
            return array();
        }
        $adminPanel = $this->createUrl('admin/index');
        return array(
            array('label'=>'进入后台管理系统', 'url'=>$adminPanel),
        ); 
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
        );
        return $menu_content;
    }
    
    public function getAdminsMenu(){
        $menu_content = array();
        $list_student = $this->createUrl('admin/list');
        $create_student = $this->createUrl('admin/create');
        $manage_student = $this->createUrl('admin/admin');
        $menu_content = array(
            array('label'=>Yii::t('common','List Admins'), 'url'=>$list_student),
            array('label'=>Yii::t('common','Create Admin'), 'url'=>$create_student),
            array('label'=>Yii::t('common','Manage Admins'), 'url'=>$manage_student),
        );
        return $menu_content;
    }
}