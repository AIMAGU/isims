<?php

/**
 * This is the model class for table "th_ajar".
 *
 * The followings are the available columns in table 'th_ajar':
 * @property string $th_ajar
 *
 * The followings are the available model relations:
 * @property Pendaftar[] $pendaftars
 * @property Pengumuman[] $pengumumen
 * @property TransaksiReal[] $transaksiReals
 * @property TransaksiPerjanjian[] $transaksiPerjanjians
 * @property Biaya[] $biayas
 * @property SemesterAktif[] $semesterAktifs
 */
class ThAjar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ThAjar the static model class
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
		return 'th_ajar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('th_ajar', 'required'),
			array('th_ajar', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('th_ajar', 'safe', 'on'=>'search'),
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
			'pendaftars' => array(self::HAS_MANY, 'Pendaftar', 'th_ajar'),
			'pengumumen' => array(self::HAS_MANY, 'Pengumuman', 'th_ajar'),
			'transaksiReals' => array(self::HAS_MANY, 'TransaksiReal', 'th_ajar'),
			'transaksiPerjanjians' => array(self::HAS_MANY, 'TransaksiPerjanjian', 'th_ajar'),
			'biayas' => array(self::HAS_MANY, 'Biaya', 'th_ajar'),
			'semesterAktifs' => array(self::HAS_MANY, 'SemesterAktif', 'th_ajar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'th_ajar' => 'Th Ajar',
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

		$criteria->compare('th_ajar',$this->th_ajar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}