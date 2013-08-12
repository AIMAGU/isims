<?php

/**
 * This is the model class for table "waktu".
 *
 * The followings are the available columns in table 'waktu':
 * @property string $idwaktu
 * @property string $hari
 * @property string $jam_mulai
 * @property string $jam_berakhir
 *
 * The followings are the available model relations:
 * @property Jadwal[] $jadwals
 */
class Waktu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Waktu the static model class
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
		return 'waktu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idwaktu, hari, jam_mulai, jam_berakhir', 'required'),
			array('idwaktu', 'length', 'max'=>5),
			array('hari', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwaktu, hari, jam_mulai, jam_berakhir', 'safe', 'on'=>'search'),
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
			'jadwals' => array(self::HAS_MANY, 'Jadwal', 'idwaktu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwaktu' => 'Idwaktu',
			'hari' => 'Hari',
			'jam_mulai' => 'Jam Mulai',
			'jam_berakhir' => 'Jam Berakhir',
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

		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('hari',$this->hari,true);
		$criteria->compare('jam_mulai',$this->jam_mulai,true);
		$criteria->compare('jam_berakhir',$this->jam_berakhir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function dialog1()
    {
    	// Warning: Please modify the following code to remove attributes that
    	// should not be searched.
    	$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Sen%'",));
    	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>16,),
		));
    }
    
    public function dialog2()
    {
    	// Warning: Please modify the following code to remove attributes that
    	// should not be searched.
    	$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Sel%'",));
    	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>16,),
		));
    }
    
    public function dialog3()
    {
    	// Warning: Please modify the following code to remove attributes that
    	// should not be searched.
    	$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Rab%'",));
    	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>16,),
		));
    }
    
    public function dialog4()
    {
    	// Warning: Please modify the following code to remove attributes that
    	// should not be searched.
    	$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Kam%'",));
    	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>16,),
		));
    }
    
    public function dialog5()
    {
    	// Warning: Please modify the following code to remove attributes that
    	// should not be searched.
    	$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Jum%'",));
    	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>16,),
		));
    }
    
    public function dialog6()
    {
    	// Warning: Please modify the following code to remove attributes that
    	// should not be searched.
    	$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Sab%'",));
    	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>16,),
		));
    }
}