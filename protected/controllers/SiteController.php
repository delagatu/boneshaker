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
        $this->render(ControllerPagePartial::PAGE_SITE_INDEX);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
        $error = Yii::app()->errorHandler->getError();
        $errorPage = 'error';

        if (is_array($error) && $error['code'] == 404)
        {
            $errorPage = '_error404';
        }

        $this->render($errorPage, array('error' => $error));

        try {
            $message = new YiiMailMessage();
            $message->view = ControllerPagePartial::MAIL_SITE_ERROR;

            //userModel is passed to the view
            $message->setBody(array('error'=>$error), 'text/html');
            $message->setSubject('boneshaker.ro - error');

            $message->addTo(Yii::app()->params['webmasterEmail']);
            $message->from = Yii::app()->params['adminEmail'];
            Yii::app()->mail->send($message);

        } catch (Exception $e)
        {
            Yii::log('Can not send register email: ' . var_export($e->getMessage(), 1));
        }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;

		if(Yii::app()->request->getIsPostRequest())
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";

                try {

                    if (mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers))
                    {
                        $message = 'Mesajul s-a trimis cu success. Vom raspunde in cel mai scurt timp posibil.';
                    } else {
                        $message = 'Mesajul nu s-a trimis din motive technice. Va rugam sa incercati din nou';
                    }

                } catch (Exception $e)
                {
                    Yii::log('SiteController::contact - cannot send mail: ' , $e->getMessage(), CLogger::LEVEL_ERROR);
                    $message = 'Mesajul nu s-a trimis din motive technice. Va rugam sa incercati din nou';
                }

				Yii::app()->user->setFlash('contact',$message);
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
		$model=new LoginForm();

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

    public function actionParametriiCautare()
    {
        $keywords = Yii::app()->request->getPost('keywords');
        $url = Yii::app()->controller->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_CAUTA, array('keywords' => $keywords));

        Yii::app()->controller->redirect($url);
    }

    public function actionCauta()
    {
        $keywords = Yii::app()->request->getQuery('keywords');
        $generaSearchForm = new GeneralSearchForm();
        $generaSearchForm->keywords = $keywords;

        $params = array('dataProvider' => $generaSearchForm->generateDataProvider());

        $this->render(ControllerPagePartial::PARTIAl_SITE_GENERAL_SEARCH, $params);
    }

    public function actionContNou()
    {
        $registerForm = new RegisterForm('siteRegister');

        if (Yii::app()->request->getIsPostRequest())
        {
            $registerForm->attributes = Yii::app()->request->getPost('RegisterForm');
            if ($registerForm->validate())
            {
                if ($registerForm->registerUser() instanceof User)
                {
                   $message = 'Pentru a finaliza crearea contului te rugam sa urmezi pasii din e-mailul trimis la adresa: ' . $registerForm->email;
                   Yii::app()->user->setFlash('success', $message);
                   $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_SITE_LOGIN));
                }
            }
        } else {
            $registerForm->terms_and_conditions = 1;
        }

        $params = array(
            'registerForm' => $registerForm
        );

        $this->render('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_SITE_REGISTER, $params);
    }

    public function actionConfirmaCont()
    {
        $confirmation_code = Yii::app()->request->getQuery('c', null);
        $user = User::getByConfirmationCode($confirmation_code);

        if (!$user instanceof User)
        {
            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE));
        }

        $user->confirmEmail();

        Yii::app()->user->setFlash('success', 'Adresa de email este confirmata.');

        $this->actionLogin();

    }

    public function actionInscriereGresita()
    {
        $confirmation_code = Yii::app()->request->getQuery('c', null);
        $user = User::getByConfirmationCode($confirmation_code);

        if (!$user instanceof User)
        {
            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE));
        }

        $user->unConfirmAccount();
        Yii::app()->user->setFlash('success', 'Contul s-a sters. Multumim pentru intelegere.');
        $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE) . '/' . ControllerPagePartial::PARTIAL_SITE_CONT_NOU);
    }

    public function actionInscriereNewsletter()
    {
        $newsLetterRegisterForm = new NewsLetterRegisterForm();

        if (Yii::app()->request->getIsPostRequest()) {
            $newsLetterRegisterForm->email = Yii::app()->request->getPost('email');
            if ($newsLetterRegisterForm->validate()) {

                if ($newsLetterRegisterForm->addToNewsletterList())
                {
                    $image = CHtml::image(Yii::app()->baseUrl . "/images/design/okSign.png", 'Una-Alta');
                    $response = $image . ' Salvat. ';
                    json::writeJSON($response);
                } else {
                    json::writeJSON('Eroare interna. Va rugam incercati mai tarziu.', false);
                }

            }

            json::writeJSON($newsLetterRegisterForm->getError('email'), false);
        }

    }

    public function actionConfirmaNewsLetter()
    {
        $confirmation_code = Yii::app()->request->getQuery('c', null);
        $user = User::getByConfirmationCode($confirmation_code);

        if (!$user instanceof User)
        {
            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE));
        }

        NewsletterUser::setStatus($user->id, NewsletterUserStatus::getIdByLabel(NewsletterUserStatus::CONFIRMED));

        Yii::app()->user->setFlash('success', 'Confirmat.');
        $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE) . '/' . ControllerPagePartial::PAGE_SITE_INDEX);

    }

    public function actionInscriereNewsLetterGresita()
    {
        $confirmation_code = Yii::app()->request->getQuery('c', null);
        $user = User::getByConfirmationCode($confirmation_code);

        if (!$user instanceof User)
        {
            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE));
        }

        try {
            NewsletterUser::setStatus($user->id, NewsletterUserStatus::getIdByLabel(NewsletterUserStatus::INACTIVE));
            $email = $user->id . $user->email;
            $user->email = $email;
            $user->saveThrowEx();
        } catch (Exception $e)
        {
            Yii::log('Can not update email SiteController::actionInscriereNewsLetterGresita');
        }


        Yii::app()->user->setFlash('success', 'Dezabonat.');
        $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE) . '/' . ControllerPagePartial::PAGE_SITE_INDEX);

    }

    public function actiontermeniSiConditii()
    {
        $this->render('/' . ControllerPagePartial::CONTROLLER_SITE . '/pages/' . ControllerPagePartial::PARTIAL_SITE_TERMS_AND_CONDITIONS);
    }

    public function actionCosulMeu()
    {

//        Yii::app()->shoppingCart->clear();
//
//        $product72 = Product::model()->findByPk(72);
//
//        Yii::app()->shoppingCart->put($product72,2); //1 item with id=1, quantity=3.
//        Yii::app()->shoppingCart->update($product72,12);

        $positions = Yii::app()->shoppingCart->getPositions();
        //getQuantity()

        $params = array(
            'positions' => $positions,
            'page_id' => Yii::app()->request->getQuery('id_page', 1),
        );

       $this->render(ControllerPagePartial::PARTIAL_SITE_MY_CART, $params);
    }

    public function actionAdaugaInCos()
    {
        if (Yii::app()->request->getIsAjaxRequest())
        {
            $id = Yii::app()->request->getQuery('id');
            $product = Product::model()->findByPk($id);

            Yii::app()->shoppingCart->put($product);
            json::writeJSON(array('message' => 'Produs adaugat.', 'id' => $id, 'prdCount' => $product->getItemCountInCart()));
        }
    }

    public function actionUpdateQuantity()
    {
        if (Yii::app()->request->getIsAjaxRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $qty = Yii::app()->request->getPost('qty');
            $id_page = Yii::app()->request->getPost('id_page');

            $product = Product::model()->findByPk($id);
            Yii::app()->shoppingCart->update($product,$qty);

            json::writeJSON(array('id' => $id, 'id_page' => $id_page));
        }
    }

    public function actionRemoveItemFromCart()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $id_page = Yii::app()->request->getPost('id_page');

            if (!empty($id))
            {
                $product = Product::model()->findByPk($id);

                if ($product instanceof Product)
                {
                    Yii::app()->shoppingCart->remove($id);
                }

                json::writeJSON(array('id' => $id, 'id_page' => $id_page));
            }

        }
    }

    public function actionPlaseazaComanda()
    {
        $positions = Yii::app()->shoppingCart->getPositions();

        $placeOrder = new PlaceOrderForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('PlaceOrderForm');

            $placeOrder->attributes = $postData;

            if ($placeOrder->validate())
            {
                if (!$placeOrder->saveOrder())
                {
                    Yii::app()->user->setFlash('error', 'Eroare interna. Referinta: ' . $placeOrder->getReference());
                }
            }

        }

        $params = array(
            'positions' => $positions,
            'page_id' => Yii::app()->request->getQuery('id_page', 1),
            'placeOrder' => $placeOrder
        );

        $this->render('_cosulMeu', $params);
    }

    public function actionTestEmailSending()
    {
//        $user = User::getByEmail('laci22002@gmail.com');
//
//        $message = new YiiMailMessage();
//        $message->view = ControllerPagePartial::MAIL_REGISTER_USER;
//
//        //userModel is passed to the view
//        $message->setBody(array('user'=>$user), 'text/html');
//        $message->setSubject('boneshaker.ro - cont nou');
//
//        $message->addTo('laci22002@gmail.com');
//        $message->from = Yii::app()->params['adminEmail'];
//        Yii::app()->mail->send($message);

        $message = new YiiMailMessage();
        $message->view = ControllerPagePartial::MAIL_SITE_ERROR;

        //userModel is passed to the view
        $message->setBody(array('error'=>'Error'), 'text/html');
        $message->setSubject('boneshaker.ro - error');

        $message->addTo(Yii::app()->params['webmasterEmail']);
        $message->from = Yii::app()->params['adminEmail'];
        Yii::app()->mail->send($message);

    }

    public function actionTestProfileSave()
    {
        $userProfile = UserProfile::saveProfile(19, array('cnp' => time()));

        $placeOrderForm = new PlaceOrderForm();
        $placeOrderForm->saveOrder();
        var_dump($placeOrderForm->getReference());
    }

}