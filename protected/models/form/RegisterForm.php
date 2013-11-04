<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/26/13
 * Time: 9:07 PM
 * To change this template use File | Settings | File Templates.
 */
class RegisterForm extends CFormModel
{
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $abonare_newsletter;
    public $terms_and_conditions;

    public function attributeLabels()
    {
        $termsAndConditions = CHtml::link('termenii si conditiile', 'javascript:');
        return array(
            'password' => 'Parola',
            'email' => 'Email',
            'first_name' => 'Prenume',
            'last_name' => 'Nume',
            'abonare_newsletter' => 'Vreau sa primesc noutatile pe email.',
            'terms_and_conditions' => 'Sunt de acord cu ' . $termsAndConditions,
        );
    }

    public function rules()
    {
        $forgotPass = CHtml::link('Probleme la autentificare?', 'javascript:');
        return array(
            array('email', 'email', 'message' => 'Adresa invalida.'),
            array('email', 'unique', 'attributeName' => 'email','className' => 'User', 'allowEmpty' => false, 'message' => 'Duplicat! ' . $forgotPass),
            array('email', 'length', 'max' => 500, 'message' => 'Probleme technice, te rog sa contactezi administratorul.'),
            array('password', 'length', 'min' => 6, 'message' => 'Minim 6 caractere.', 'tooShort' => 'Minim 6 caractere.'),
            array('password', 'required', 'message' => 'Obligatoriu.'),
            array('first_name, last_name', 'required', 'on' => 'siteRegister', 'message' => 'Obligatoriu.'),
            array('first_name, last_name', 'safe', 'on' => 'newsLetterRegister'),
            array('abonare_newsletter', 'boolean'),
            array('abonare_newsletter', 'safe'),
            array('terms_and_conditions', 'compare', 'compareValue' => true, 'message' => 'Inregistrarea nu este posibila fara consultarea si acceptarea termenilor si conditiilor.'),
            array('terms_and_conditions', 'required'),
        );
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++)
        {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;

    }

    private function sendRegisterMail(User $user)
    {
        try {
            $message = new YiiMailMessage();
            $message->view = ControllerPagePartial::MAIL_REGISTER_USER;

            //userModel is passed to the view
            $message->setBody(array('user'=>$user), 'text/html');
            $message->setSubject('boneshaker.ro - cont nou');

            $message->addTo($this->email);
            $message->from = Yii::app()->params['adminEmail'];
            Yii::app()->mail->send($message);
        } catch (Exception $e)
        {
            Yii::log('Can not send register email: ' . var_export($e->getMessage(), 1));
        }

    }

    public function registerUser($sendEmail = true)
    {
        try {
            $user = new User();
            $user->username = $this->email;
            $pass_hash = md5($this->generateRandomString(10));
            $user->password = md5($this->password . $pass_hash);
            $user->password_hash = $pass_hash;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->status_id = UserStatus::getIdByLabel(UserStatus::EMAIL_NOT_CONFIRMED);
            $user->confirmation_code = md5($this->generateRandomString(12));
            $user->saveThrowEx();

            if ($sendEmail)
            {
                $this->sendRegisterMail($user);
            }


        } catch (Exception $e)
        {
            Yii::log('Can not register user: ' . var_export($e->getMessage(), 1));
        }

        return $user;
    }

}
