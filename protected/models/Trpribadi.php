<?php

/**
 * This is the model class for table "tr_pribadi".
 *
 * The followings are the available columns in table 'tr_pribadi':
 * @property integer $id_tranpribadi
 * @property integer $id_pribadi
 * @property integer $nis
 * @property string $th_ajar
 * @property string $semester
 * @property string $nilai_pribadi
 * @property string $catatan
 *
 * The followings are the available model relations:
 * @property Siswa $nis0
 * @property Kepribadian $idPribadi
 * @property SemesterAktif $thAjar
 * @property SemesterAktif $semester0
 */
class Trpribadi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trpribadi the static model class
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
		return 'tr_pribadi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pribadi, nis, th_ajar, semester', 'required'),
			array('id_pribadi, nis', 'numerical', 'integerOnly'=>true),
			array('th_ajar', 'length', 'max'=>10),
			array('semester, nilai_pribadi', 'length', 'max'=>1),
			array('catatan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tranpribadi, id_pribadi, nis, th_ajar, semester, nilai_pribadi, catatan', 'safe', 'on'=>'search'),
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
			'nis0' => array(self::BELONGS_TO, 'Siswa', 'nis'),
			'idPribadi' => array(self::BELONGS_TO, 'Kepribadian', 'id_pribadi'),
			'thAjar' => array(self::BELONGS_TO, 'SemesterAktif', 'th_ajar'),
			'semester0' => array(self::BELONGS_TO, 'SemesterAktif', 'semester'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tranpribadi' => 'Id Tranpribadi',
			'id_pribadi' => 'Id Pribadi',
			'nis' => 'Nis',
			'th_ajar' => 'Th Ajar',
			'semester' => 'Semester',
			'nilai_pribadi' => 'Nilai Pribadi',
			'catatan' => 'Catatan',
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

		$criteria->compare('id_tranpribadi',$this->id_tranpribadi);
		$criteria->compare('id_pribadi',$this->id_pribadi);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('nilai_pribadi',$this->nilai_pribadi,true);
		$criteria->compare('catatan',$this->catatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function raport()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria = new CDbCriteria(array(
			'condition' => "nis='".$_GET['id']."' and id_pribadi not in (4,5)",
		));
	
		$criteria->compare('id_tranpribadi',$this->id_tranpribadi);
		$criteria->compare('id_pribadi',$this->id_pribadi);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('nilai_pribadi',$this->nilai_pribadi,true);
		$criteria->compare('catatan',$this->catatan,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function tentang()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}elseif($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		
		$criteria = new CDbCriteria(array(
				'condition' => "id_pribadi=5 and nis='".$_GET['id']."'",
		));
	
		$criteria->compare('id_tranpribadi',$this->id_tranpribadi);
		$criteria->compare('id_pribadi',$this->id_pribadi);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$th_ajar,true);
		$criteria->compare('semester',$smt,true);
		$criteria->compare('nilai_pribadi',$this->nilai_pribadi,true);
		$criteria->compare('catatan',$this->catatan,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function catatan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}elseif($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "id_pribadi=4 and nis='".$_GET['id']."'",
		));
	
		$criteria->compare('id_tranpribadi',$this->id_tranpribadi);
		$criteria->compare('id_pribadi',$this->id_pribadi);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$th_ajar,true);
		$criteria->compare('semester',$smt,true);
		$criteria->compare('nilai_pribadi',$this->nilai_pribadi,true);
		$criteria->compare('catatan',$this->catatan,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
}