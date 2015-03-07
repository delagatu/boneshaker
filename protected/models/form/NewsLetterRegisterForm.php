<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/3/13
 * Time: 9:05 PM
 * To change this template use File | Settings | File Templates.
 */
class NewsLetterRegisterForm extends CFormModel
{

    public $email;

    public function attributeLabels()
    {
        return array(
            'email' => 'Fii la curent cu noutatile'
        );
    }

    public function rules()
    {
        $forgotPass = CHtml::link('Reactivati?', 'javascript:');

        return array(
            array('email', 'email', 'message' => 'Adresa invalida.'),
            array('email', 'unique', 'attributeName' => 'email','className' => 'User', 'allowEmpty' => false, 'message' => 'Duplicat! '),
            array('email', 'length', 'max' => 500, 'message' => 'Probleme technice, te rog sa contactezi administratorul.'),
            );
    }

    private function sendRegisterMail(User $user)
    {
        try {
            $message = new YiiMailMessage();
            $message->view = ControllerPagePartial::MAIL_REGISTER_USER_NEWSLETTER;

            //userModel is passed to the view
            $message->setBody(array('user'=>$user), 'text/html');
            $message->setSubject('boneshaker.ro - abonare newsletter');

            $message->addTo($this->email);
            $message->from = Yii::app()->params['adminEmail'];
            Yii::app()->mail->send($message);
        } catch (Exception $e)
        {
            Yii::log('Can not send register email: ' . var_export($e->getMessage(), 1));
        }

    }

    public function addToNewsletterList()
    {
        $transaction = Yii::app()->db->beginTransaction();

        try {
            $registerForm = new RegisterForm();
            $registerForm->email = $this->email;
            $registerForm->first_name = NULL;
            $registerForm->last_name = NULL;
            $registerForm->terms_and_conditions = 1;
            $registerForm->password = $registerForm->generateRandomString(6);
            $user = $registerForm->registerUser(false);

            if ($user instanceof User)
            {
                $newsletterUser = new NewsletterUser();
                $newsletterUser->user_id = $user->id;
                $newsletterUser->status_id = NewsletterUserStatus::getIdByLabel(NewsletterUserStatus::UNCONFIRMED);
                $newsletterUser->saveThrowEx();

                $this->sendRegisterMail($user);

            }

            $transaction->commit();

        } catch (Exception $e)
        {
            Yii::log('Can not save the newsletter ('.$this->email.'): ' . var_export($e->getMessage(), 1));
            $transaction->rollback();
            return false;
        }

        return true;


    }

}
