<?php

/**
 * This is the model class for table "keluarga".
 *
 * The followings are the available columns in table 'keluarga':
 * @property integer $no_kk
 * @property integer $nik_ibu
 * @property integer $nik_ayah
 * @property integer $jumlah_anak
 * @property string $status_rumah
 *
 * The followings are the available model relations:
 * @property Pendaftar[] $pendaftars
 * @property Siswa[] $siswas
 * @property Ibu $nikIbu
 * @property Ayah $nikAyah
 */
class Keluarga extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Keluarga the static model class
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
		return 'keluarga';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_kk, nik_ibu, nik_ayah, jumlah_anak, status_rumah', 'required'),
			array('no_kk, nik_ibu, nik_ayah, jumlah_anak', 'numerical', 'integerOnly'=>true),
			array('status_rumah', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('no_kk, nik_ibu, nik_ayah, jumlah_anak, status_rumah', 'safe', 'on'=>'search'),
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
			'pendaftars' => array(self::HAS_MANY, 'Pendaftar', 'no_kk'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'no_kk'),
			'nikIbu' => array(self::BELONGS_TO, 'Ibu', 'nik_ibu'),
			'nikAyah' => array(self::BELONGS_TO, 'Ayah', 'nik_ayah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'no_kk' => 'No Kk',
			'nik_ibu' => 'Nik Ibu',
			'nik_ayah' => 'Nik Ayah',
			'jumlah_anak' => 'Jumlah Anak',
			'status_rumah' => 'Status Rumah',
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

		$criteria->compare('no_kk',$this->no_kk);
		$criteria->compare('nik_ibu',$this->nik_ibu);
		$criteria->compare('nik_ayah',$this->nik_ayah);
		$criteria->compare('jumlah_anak',$this->jumlah_anak);
		$criteria->compare('status_rumah',$this->status_rumah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}