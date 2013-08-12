<?php

/**
 * This is the model class for table "penempatan_mapel".
 *
 * The followings are the available columns in table 'penempatan_mapel':
 * @property string $kode_mapel
 * @property string $kurikulum
 * @property string $kelas
 * @property string $lokal
 *
 * The followings are the available model relations:
 * @property Lokal $kelas0
 * @property Lokal $lokal0
 * @property MataPelajaran $kodeMapel
 * @property MataPelajaran $kurikulum0
 */
class PenempatanMapel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PenempatanMapel the static model class
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
		return 'penempatan_mapel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_mapel, kurikulum, kelas, lokal', 'required'),
			array('kode_mapel', 'length', 'max'=>6),
			array('kurikulum, kelas, lokal', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_mapel, kurikulum, kelas, lokal', 'safe', 'on'=>'search'),
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
			'kelas0' => array(self::BELONGS_TO, 'Lokal', 'kelas'),
			'lokal0' => array(self::BELONGS_TO, 'Lokal', 'lokal'),
			'kodeMapel' => array(self::BELONGS_TO, 'MataPelajaran', 'kode_mapel'),
			'kurikulum0' => array(self::BELONGS_TO, 'MataPelajaran', 'kurikulum'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_mapel' => 'Kode Mapel',
			'kurikulum' => 'Kurikulum',
			'kelas' => 'Kelas',
			'lokal' => 'Lokal',
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

		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('lokal',$this->lokal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}