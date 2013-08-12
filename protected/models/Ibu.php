<?php

/**
 * This is the model class for table "ibu".
 *
 * The followings are the available columns in table 'ibu':
 * @property integer $nik_ibu
 * @property string $nama_ibu
 * @property string $agama_ibu
 * @property string $tempat_lahir_ibu
 * @property string $tanggal_lahir_ibu
 * @property string $pend_ibu
 * @property string $pekerjaan_ibu
 * @property string $telp_ibu
 * @property integer $penghasilan_ibu
 *
 * The followings are the available model relations:
 * @property Keluarga[] $keluargas
 */
class Ibu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ibu the static model class
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
		return 'ibu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nik_ibu, nama_ibu, agama_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, pend_ibu, penghasilan_ibu', 'required'),
			array('nik_ibu, penghasilan_ibu', 'numerical', 'integerOnly'=>true),
			array('nama_ibu', 'length', 'max'=>50),
			array('agama_ibu', 'length', 'max'=>10),
			array('tempat_lahir_ibu, pend_ibu, pekerjaan_ibu', 'length', 'max'=>30),
			array('telp_ibu', 'length', 'max'=>13),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nik_ibu, nama_ibu, agama_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, pend_ibu, pekerjaan_ibu, telp_ibu, penghasilan_ibu', 'safe', 'on'=>'search'),
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
			'keluargas' => array(self::HAS_MANY, 'Keluarga', 'nik_ibu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nik_ibu' => 'Nik Ibu',
			'nama_ibu' => 'Nama Ibu',
			'agama_ibu' => 'Agama Ibu',
			'tempat_lahir_ibu' => 'Tempat Lahir Ibu',
			'tanggal_lahir_ibu' => 'Tanggal Lahir Ibu',
			'pend_ibu' => 'Pend Ibu',
			'pekerjaan_ibu' => 'Pekerjaan Ibu',
			'telp_ibu' => 'Telp Ibu',
			'penghasilan_ibu' => 'Penghasilan Ibu',
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

		$criteria->compare('nik_ibu',$this->nik_ibu);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('agama_ibu',$this->agama_ibu,true);
		$criteria->compare('tempat_lahir_ibu',$this->tempat_lahir_ibu,true);
		$criteria->compare('tanggal_lahir_ibu',$this->tanggal_lahir_ibu,true);
		$criteria->compare('pend_ibu',$this->pend_ibu,true);
		$criteria->compare('pekerjaan_ibu',$this->pekerjaan_ibu,true);
		$criteria->compare('telp_ibu',$this->telp_ibu,true);
		$criteria->compare('penghasilan_ibu',$this->penghasilan_ibu);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}