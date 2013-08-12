<?php

/**
 * This is the model class for table "jadwal".
 *
 * The followings are the available columns in table 'jadwal':
 * @property string $idruang
 * @property string $kode_guru
 * @property string $kode_mapel
 * @property string $kelas
 * @property string $lokal
 * @property string $th_ajar
 * @property string $semester
 * @property string $idwaktu
 * @property string $kurikulum
 *
 * The followings are the available model relations:
 * @property Ruangan $idruang0
 * @property SemesterAktif $thAjar
 * @property SemesterAktif $semester0
 * @property Waktu $idwaktu0
 * @property PenempatanMapel $kodeMapel
 * @property PenempatanMapel $kelas0
 * @property PenempatanMapel $lokal0
 * @property PenempatanMapel $kurikulum0
 * @property Guru $kodeGuru
 */
class Jadwal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jadwal the static model class
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
		return 'jadwal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idruang, kode_guru, kode_mapel, kelas, lokal, th_ajar, semester, idwaktu, kurikulum', 'required'),
			array('idruang', 'length', 'max'=>20),
			array('kode_guru', 'length', 'max'=>2),
			array('kode_mapel, idwaktu', 'length', 'max'=>6),
			array('kelas, lokal, semester', 'length', 'max'=>1),
			array('th_ajar, kurikulum', 'length', 'max'=>10),
			// The following rule is used by search().
			array('kode_guru', 'CompositeUniqueKeyValidator', 'keyColumns' => 'kode_guru, idwaktu, th_ajar, semester'),
			// Please remove those attributes that should not be searched.
			array('idruang, kode_guru, kode_mapel, kelas, lokal, th_ajar, semester, idwaktu, kurikulum', 'safe', 'on'=>'search'),
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
			'idruang0' => array(self::BELONGS_TO, 'Ruangan', 'idruang'),
			'thAjar' => array(self::BELONGS_TO, 'SemesterAktif', 'th_ajar'),
			'semester0' => array(self::BELONGS_TO, 'SemesterAktif', 'semester'),
			'idwaktu0' => array(self::BELONGS_TO, 'Waktu', 'idwaktu'),
			'kodeMapel' => array(self::BELONGS_TO, 'PenempatanMapel', 'kode_mapel'),
			'kelas0' => array(self::BELONGS_TO, 'PenempatanMapel', 'kelas'),
			'lokal0' => array(self::BELONGS_TO, 'PenempatanMapel', 'lokal'),
			'kurikulum0' => array(self::BELONGS_TO, 'PenempatanMapel', 'kurikulum'),
			'kodeGuru' => array(self::BELONGS_TO, 'Guru', 'kode_guru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idruang' => 'Idruang',
			'kode_guru' => 'Kode Guru',
			'kode_mapel' => 'Kode Mapel',
			'kelas' => 'Kelas',
			'lokal' => 'Lokal',
			'th_ajar' => 'Th Ajar',
			'semester' => 'Semester',
			'idwaktu' => 'Idwaktu',
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

		$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//Untuk dialog pada jurnal, pengelompokan idwaktu
	public function idwaktujurnal()
	{
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
			'condition'=>"kode_guru='".Yii::app()->user->id."' and th_ajar='".$th_ajar."' and semester='".$smt."'",
		));
	
		$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function search1()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "idwaktu LIKE 'Sen%'",));
		$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	////////////////////////////////////---SENIN---//////////////////////////////////////////////////////////////
	
	public function senin1a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array(
				'condition' => "kelas='1' and lokal='A' and idwaktu LIKE 'Sen%'",
				//Agar tidak tampil redudanci data!
				//'select'=>'idwaktu,idruang,kode_guru,kode_mapel,kelas,lokal',
				//'group' => 'idwaktu,idruang,kode_guru,kode_mapel,kelas,lokal'
		));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin1b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='B' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin1c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='C' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin2a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='A' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin2b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='B' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin2c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='C' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin3a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='A' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin3b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='B' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin3c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='C' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin4a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='A' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin4b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='B' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin4c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='C' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin5a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='A' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin5b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='B' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin5c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='C' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin6a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='A' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin6b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='B' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function senin6c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='C' and idwaktu LIKE 'Sen%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	/////////////////////////////////////////---SELASA---////////////////////////////////////////////////////////
	public function selasa1a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='A' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa1b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='B' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa1c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='C' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa2a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='A' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa2b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='B' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa2c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='C' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa3a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='A' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa3b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='B' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa3c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='C' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa4a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='A' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa4b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='B' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa4c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='C' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa5a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='A' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa5b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='B' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa5c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='C' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa6a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='A' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa6b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='B' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function selasa6c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='C' and idwaktu LIKE 'Sel%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	//----------------------------------------------------- RABU -------------------------------------------------------
	
	public function rabu1a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='A' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu1b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='B' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu1c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='C' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu2a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='A' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu2b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='B' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu2c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='C' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu3a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='A' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu3b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='B' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu3c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='C' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu4a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='A' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu4b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='B' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu4c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='C' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu5a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='A' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu5b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='B' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu5c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='C' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu6a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='A' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu6b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='B' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function rabu6c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='C' and idwaktu LIKE 'Rab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	//----------------------------------- KAMIS ------------------------------------------------------------------------
	public function kamis1a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='A' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis1b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='B' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis1c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='C' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis2a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='A' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis2b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='B' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis2c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='C' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis3a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='A' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis3b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='B' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis3c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='C' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis4a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='A' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis4b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='B' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis4c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='C' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis5a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='A' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis5b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='B' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis5c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='C' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis6a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='A' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis6b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='B' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function kamis6c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='C' and idwaktu LIKE 'Kam%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	//-------------------------------------------- JUMAT -------------------------------------------------------------
	public function jumat1a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='A' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat1b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='B' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat1c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='C' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat2a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='A' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat2b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='B' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat2c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='C' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat3a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='A' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat3b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='B' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat3c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='C' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat4a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='A' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat4b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='B' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat4c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='C' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat5a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='A' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat5b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='B' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat5c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='C' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat6a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='A' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat6b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='B' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jumat6c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='C' and idwaktu LIKE 'Jum%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	//-----------------------------------------------SABTU --------------------------------------------------------
	
	public function sabtu1a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='A' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu1b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='B' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu1c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='1' and lokal='C' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu2a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='A' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu2b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='B' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu2c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='2' and lokal='C' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu3a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='A' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu3b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='B' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu3c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='3' and lokal='C' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu4a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='A' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu4b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='B' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu4c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='4' and lokal='C' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu5a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='A' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu5b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='B' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu5c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='5' and lokal='C' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu6a()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='A' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu6b()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='B' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function sabtu6c()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria(array('condition' => "kelas='6' and lokal='C' and idwaktu LIKE 'Sab%'",));
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}