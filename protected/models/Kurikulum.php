<?php

/**
 * This is the model class for table "kurikulum".
 *
 * The followings are the available columns in table 'kurikulum':
 * @property string $kurikulum
 * @property string $tahun_berlaku
 */
class Kurikulum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kurikulum the static model class
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
		return 'kurikulum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kurikulum, tahun_berlaku', 'required'),
			array('kurikulum', 'length', 'max'=>1),
			array('tahun_berlaku', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kurikulum, tahun_berlaku', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kurikulum' => 'Kurikulum',
			'tahun_berlaku' => 'Tahun Berlaku',
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

		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('tahun_berlaku',$this->tahun_berlaku,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}