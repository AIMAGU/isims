<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $kode_guru
 *
 * The followings are the available model relations:
 * @property Guru $kodeGuru
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('kode_guru', 'unique'),
			array('username, password, email', 'length', 'min'=>6, 'max'=>32),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
					'message'=>'Username can contain only alphanumeric characters and hyphens(-).'),
			array('username','unique'),
			array('kode_guru', 'length', 'max'=>2),
			array('email','email'),
			array('email','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, kode_guru', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'kodeGuru' => array(self::BELONGS_TO, 'Guru', 'kode_guru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'kode_guru' => 'Kode Guru',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password)
	{
		//return $this->hashPassword($password,$this->salt)===$this->password;
		return md5('isims'.$password)===$this->password;
	}
}