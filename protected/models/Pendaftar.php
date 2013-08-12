<?php

/**
 * This is the model class for table "pendaftar".
 *
 * The followings are the available columns in table 'pendaftar':
 * @property integer $no_pendaftaran
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $jk
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property integer $anak_ke
 * @property string $status
 * @property integer $jml_saudara
 * @property string $alamat
 * @property string $no_telp
 * @property string $agama
 * @property string $kewarganegaraan
 * @property string $bahasa
 * @property integer $jarak_rumah
 * @property string $foto
 * @property string $th_ajar
 * @property integer $idkec
 * @property integer $id_sekolah
 * @property integer $nik_wali
 * @property integer $no_kk
 *
 * The followings are the available model relations:
 * @property ThAjar $thAjar
 * @property Kecamatan $idkec0
 * @property Keluarga $noKk
 * @property AsalSekolah $idSekolah
 * @property Wali $nikWali
 * @property Siswa[] $siswas
 * @property TransaksiPerjanjian[] $transaksiPerjanjians
 */
class Pendaftar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pendaftar the static model class
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
		return 'pendaftar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_pendaftaran, nama_lengkap, jk, tempat_lahir, tanggal_lahir, anak_ke, status, jml_saudara, alamat, agama, kewarganegaraan, th_ajar, idkec, id_sekolah, no_kk', 'required'),
			array('no_pendaftaran, anak_ke, jml_saudara, jarak_rumah, idkec, id_sekolah, nik_wali, no_kk', 'numerical', 'integerOnly'=>true),
			array('nama_lengkap, alamat', 'length', 'max'=>50),
			array('nama_panggilan, bahasa', 'length', 'max'=>20),
			array('jk', 'length', 'max'=>1),
			array('tempat_lahir', 'length', 'max'=>30),
			array('status', 'length', 'max'=>15),
			array('no_telp', 'length', 'max'=>13),
			array('agama, th_ajar', 'length', 'max'=>10),
			array('kewarganegaraan', 'length', 'max'=>3),
			array('foto','file', 'types'=>'gif, png, jpg, jpeg'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('no_pendaftaran, nama_lengkap, nama_panggilan, jk, tempat_lahir, tanggal_lahir, anak_ke, status, jml_saudara, alamat, no_telp, agama, kewarganegaraan, bahasa, jarak_rumah, foto, th_ajar, idkec, id_sekolah, nik_wali, no_kk', 'safe', 'on'=>'search'),
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
			'thAjar' => array(self::BELONGS_TO, 'ThAjar', 'th_ajar'),
			'idkec0' => array(self::BELONGS_TO, 'Kecamatan', 'idkec'),
			'noKk' => array(self::BELONGS_TO, 'Keluarga', 'no_kk'),
			'idSekolah' => array(self::BELONGS_TO, 'AsalSekolah', 'id_sekolah'),
			'nikWali' => array(self::BELONGS_TO, 'Wali', 'nik_wali'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'no_pendaftaran'),
			'transaksiPerjanjians' => array(self::HAS_MANY, 'TransaksiPerjanjian', 'no_pendaftaran'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'no_pendaftaran' => 'No Pendaftaran',
			'nama_lengkap' => 'Nama Lengkap',
			'nama_panggilan' => 'Nama Panggilan',
			'jk' => 'Jk',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'anak_ke' => 'Anak Ke',
			'status' => 'Status',
			'jml_saudara' => 'Jml Saudara',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'agama' => 'Agama',
			'kewarganegaraan' => 'Kewarganegaraan',
			'bahasa' => 'Bahasa',
			'jarak_rumah' => 'Jarak Rumah',
			'foto' => 'Foto',
			'th_ajar' => 'Th Ajar',
			'idkec' => 'Idkec',
			'id_sekolah' => 'Id Sekolah',
			'nik_wali' => 'Nik Wali',
			'no_kk' => 'No Kk',
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

		$criteria->compare('no_pendaftaran',$this->no_pendaftaran);
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('nama_panggilan',$this->nama_panggilan,true);
		$criteria->compare('jk',$this->jk,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('anak_ke',$this->anak_ke);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('jml_saudara',$this->jml_saudara);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('kewarganegaraan',$this->kewarganegaraan,true);
		$criteria->compare('bahasa',$this->bahasa,true);
		$criteria->compare('jarak_rumah',$this->jarak_rumah);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('idkec',$this->idkec);
		$criteria->compare('id_sekolah',$this->id_sekolah);
		$criteria->compare('nik_wali',$this->nik_wali);
		$criteria->compare('no_kk',$this->no_kk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}