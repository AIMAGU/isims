<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Pengaturan extends CFormModel
{
	public $title;
	public $subtitle;
	public $footer;
	public $email;
	public $filee;
	public $favicon;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('title, subtitle, footer, email', 'required'),
			array('filee, favicon', 'file', 'types'=> 'png', 'allowEmpty'=>true, 'maxSize' => 1024*1024, // 100 kb
					'tooLarge' => 'Ukuran file maksimal 100 kb dan bertype .png',
			),
			// email has to be a valid email address
			array('email', 'email'),
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
			'title'=>'Judul / Header',
			'subtitle'=>'Slogan / Subtitle',
			'footer'=>'Footer',
			'filee'=>'Logo Header'
			//'verifyCode'=>'Verification Code',
		);
	}
}