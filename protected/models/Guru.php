<?php

/**
 * This is the model class for table "guru".
 *
 * The followings are the available columns in table 'guru':
 * @property string $kode_guru
 * @property string $nama_guru
 * @property string $nip
 * @property string $jabatan
 * @property string $ahli
 * @property string $agama
 * @property string $alamat
 * @property string $jk
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $telp
 * @property string $foto
 * @property integer $idkec
 * @property integer $no_sertifikasi
 *
 * The followings are the available model relations:
 * @property User[] $users
 * @property Kecamatan $idkec0
 * @property Nilai[] $nilais
 */
class Guru extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guru the static model class
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
		return 'guru';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_guru, nama_guru, nip, jabatan, ahli, agama, alamat, jk, tempat_lahir, tanggal_lahir, telp, idkec, no_sertifikasi', 'required'),
			array('idkec, no_sertifikasi, telp', 'numerical', 'integerOnly'=>true),
			array('kode_guru', 'length', 'max'=>2),
			array('nama_guru, tempat_lahir', 'length', 'max'=>30),
			array('nip', 'length', 'max'=>18),
			array('jabatan, ahli', 'length', 'max'=>20),
			array('agama', 'length', 'max'=>10),
			array('alamat', 'length', 'max'=>50),
			array('jk', 'length', 'max'=>1),
			//array('foto','file', 'types'=>'png, jpg, jpeg'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_guru, nama_guru, nip, jabatan, ahli, agama, alamat, jk, tempat_lahir, tanggal_lahir, telp, idkec, no_sertifikasi', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'User', 'kode_guru'),
			'idkec0' => array(self::BELONGS_TO, 'Kecamatan', 'idkec'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'kode_guru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_guru' => 'Kode Guru',
			'nama_guru' => 'Nama Guru',
			'nip' => 'Nip',
			'jabatan' => 'Jabatan',
			'ahli' => 'Ahli',
			'agama' => 'Agama',
			'alamat' => 'Alamat',
			'jk' => 'Jk',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'telp' => 'Telp',
			'foto' => 'Foto',
			'idkec' => 'Idkec',
			'no_sertifikasi' => 'No Sertifikasi',
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

		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('nama_guru',$this->nama_guru,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('ahli',$this->ahli,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('jk',$this->jk,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('idkec',$this->idkec);
		$criteria->compare('no_sertifikasi',$this->no_sertifikasi);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				//Buat pagging gan!
				//'pagination'=>array('pageSize'=>5),
		));
	}
}