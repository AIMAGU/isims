<?php

/**
 * This is the model class for table "nilai".
 *
 * The followings are the available columns in table 'nilai':
 * @property integer $na
 * @property integer $un
 * @property integer $uas
 * @property integer $nis
 * @property string $kode_mapel
 * @property string $kelas
 * @property string $lokal
 * @property string $kode_guru
 * @property integer $id_nilai
 *
 * The followings are the available model relations:
 * @property Siswa $nis0
 * @property MataPelajaran $kodeMapel
 * @property Guru $kodeGuru
 */
class Nilai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nilai the static model class
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
		return 'nilai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('na, un, uas, nis, kode_mapel, kelas, lokal, kode_guru', 'required'),
			array('na, un, uas, nis', 'numerical', 'integerOnly'=>true),
			array('kode_mapel', 'length', 'max'=>6),
			array('kelas', 'length', 'max'=>5),
			array('lokal', 'length', 'max'=>1),
			array('kode_guru', 'length', 'max'=>2),
			//array('kelas', 'compositeUnique', 'other' => 'nis'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('na, un, uas, nis, kode_mapel, kelas, lokal, kode_guru, id_nilai', 'safe', 'on'=>'search'),
		);
	}
	
	/*public function compositeUnique($nis, $kode_mapel)
	{
		$object=$this->model()->findByAttributes(array(
				$nis=>$this->$nis,
				$kode_mapel['other']=>$this->$kode_mapel['other'],
		));
		if ($object!==""){
			$this->addError($nis, 'Maaf data sudah ada dalam database!');
		}
	}*/

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'nis0' => array(self::BELONGS_TO, 'Siswa', 'nis'),
			'kodeMapel' => array(self::BELONGS_TO, 'MataPelajaran', 'kode_mapel'),
			'kodeGuru' => array(self::BELONGS_TO, 'Guru', 'kode_guru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'na' => 'Na',
			'un' => 'Un',
			'uas' => 'Uas',
			'nis' => 'nis',
			'kode_mapel' => 'Kode Mapel',
			'kelas' => 'Kelas',
			'lokal' => 'Lokal',
			'kode_guru' => 'Kode Guru',
			'id_nilai' => 'Id Nilai',
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

		$criteria->compare('na',$this->na);
		$criteria->compare('un',$this->un);
		$criteria->compare('uas',$this->uas);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('id_nilai',$this->id_nilai);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}