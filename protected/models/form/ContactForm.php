<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
            array('name', 'required', 'message' => 'Numele este obligatoriu.'),
            array('email', 'required', 'message' => 'Va rugam sa completati adresa de email.'),
            array('subject', 'required', 'message' => 'Va rugam sa completati subiectul mesajului.'),
            array('body', 'required', 'message' => 'Va rugam sa completati campul mesaj.'),
			array('email', 'email'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message' => 'Codul de verificare introdus nu corespunde cu cel din imaginea alaturata.'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Cod verificare',
            'name' => 'Numele',
            'email' => 'Adresa dvs. de email',
            'subject' => 'Subiect',
            'body' => 'Mesaj'
		);
	}
}