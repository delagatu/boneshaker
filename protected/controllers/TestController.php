<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/2/13
 * Time: 9:56 PM
 * To change this template use File | Settings | File Templates.
 */
class TestController extends BaseController
{
    public function actionSendMail()
    {

        $user = User::model()->findByPK(1);
        $registerForm = new RegisterForm();
        $registerForm->email = 'orban.laszlo@mailinator.com';

        $message = new YiiMailMessage();
        $message->view = 'registerUser';

        //userModel is passed to the view
        $message->setBody(array('user'=>$user), 'text/html');
        $message->setSubject('boneshaker.ro');


        $message->addTo($registerForm->email);
        $message->from = Yii::app()->params['adminEmail'];
        Yii::app()->mail->send($message);
    }

    public function actionCheckRegisterMail()
    {
        $user = User::getById(1);
        $this->renderPartial('/mail/registerUser', array('user' => $user));
    }

}
