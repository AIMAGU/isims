<?php

/**
 * This is the model class for table "mata_pelajaran".
 *
 * The followings are the available columns in table 'mata_pelajaran':
 * @property string $kode_mapel
 * @property string $mapel
 * @property integer $kkm
 * @property string $kurikulum
 *
 * The followings are the available model relations:
 * @property Kurikulum $kurikulum0
 * @property PenempatanMapel[] $penempatanMapels
 * @property PenempatanMapel[] $penempatanMapels1
 */
class MataPelajaran extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MataPelajaran the static model class
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
		return 'mata_pelajaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_mapel, mapel, kkm, kurikulum', 'required'),
			array('kkm', 'numerical', 'integerOnly'=>true),
			array('kode_mapel', 'length', 'max'=>6),
			array('mapel', 'length', 'max'=>20),
			array('kurikulum', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_mapel, mapel, kkm, kurikulum', 'safe', 'on'=>'search'),
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
			'kurikulum0' => array(self::BELONGS_TO, 'Kurikulum', 'kurikulum'),
			'penempatanMapels' => array(self::HAS_MANY, 'PenempatanMapel', 'kode_mapel'),
			'penempatanMapels1' => array(self::HAS_MANY, 'PenempatanMapel', 'kurikulum'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_mapel' => 'Kode Mapel',
			'mapel' => 'Mapel',
			'kkm' => 'Kkm',
			'kurikulum' => 'Kurikulum',
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
		$criteria->compare('mapel',$this->mapel,true);
		$criteria->compare('kkm',$this->kkm);
		$criteria->compare('kurikulum',$this->kurikulum,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}