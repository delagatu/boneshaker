<?php

class SiteController extends BaseController
{

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

        $product = new Product();

        $criteria = new CDbCriteria;
        $criteria->order = 'created_at DESC';
        $total = $product->count($criteria);

        $pages=new CPagination($total);
        $pages->pageSize = BaseController::HOME_PAGE_SIZE;
        $pages->applyLimit($criteria);

        $products = $product->getProduct($pages->offset, $pages->limit);

        $indexParams = array(
            'products' => $products,
            'pages'=>$pages,
        );

        $this->render(ControllerPagePartial::PAGE_SITE_INDEX, $indexParams);
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
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
			if($model->validate() && $model->login())
            $this->getUserHomePage();
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->request->hostinfo . '/index.php');
	}
	
	/**
	* Display the bikes
	*/
	
	public function actionBiciclete()
	{
		if (!isset($_GET['maker'])){
			// read all the makers from the db
			$maker = new Maker();
			$makers = $maker->find('maker_available = 1');
			$params =  array('maker'=>$makers);
		} else {
			$params = array('maker' => $_GET['maker']);
		}
		
		$this->render('biciclete', $params);
	
	}
	
	/**
	* Display the accessories
	*/
	
	public function actionAccesorii(){
	
		$this->render('accesorii');
		
	}
	
	/**
	* Display the equipment
	*/
	
	public function actionEchipamente(){
		
		$this->render('echipamente');
		
	}
	
}