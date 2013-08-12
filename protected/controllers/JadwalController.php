<?php

class JadwalController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/columnku';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
				'rights',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id,$id2,$id3,$id4)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id,$id2,$id3,$id4),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Jadwal;
		$model2=new Thajar;
		$model3=new SemesterAktif;
		
		if(isset($_POST['Jadwal']))
		{
			//Set validasi create th_ajar otomatis
			$tahun1=Yii::app()->db->createCommand("select th_ajar from th_ajar where th_ajar='".date('Y').'/'.(date('Y')+1)."';")->queryScalar();
			//2013/2014
			$tahun2=date('Y').'/'.(date('Y')+1);
			//2013/2014
			$tahun3=Yii::app()->db->createCommand("select th_ajar from th_ajar order by th_ajar DESC limit 1;")->queryScalar();
			$bulan=date('m');
			//Validasi dari set validasi (Create th_ajar otomatis)
			if ($bulan>=1 && $bulan<=6){
				if($tahun1!=$tahun2){
					$model2=new Thajar;
					$model2->th_ajar = date('Y').'/'.(date('Y')+1);
					if($model2->save()){
						$model3=new SemesterAktif;
						$model3->th_ajar= Yii::app()->db->createCommand("select th_ajar from th_ajar order by th_ajar DESC limit 1;")->queryScalar();
						$model3->semester=1;
						$model3->bulanawal='Juli';
						$model3->bulanakhir='Desember';
						$model3->save();
					}
				}
			}
			else if($bulan>=6 && $bulan<=12){
				if($tahun1!=$tahun2){
					$model3=new SemesterAktif;
					$model3->th_ajar= Yii::app()->db->createCommand("select th_ajar from th_ajar order by th_ajar DESC limit 1;")->queryScalar();
					$model3->semester=2;
					$model3->bulanawal='Januari';
					$model3->bulanakhir='Juni';
					$model3->save();
				}elseif($tahun1==$tahun2){
					$model3=new SemesterAktif;
					$model3->th_ajar= Yii::app()->db->createCommand("select th_ajar from th_ajar order by th_ajar DESC limit 1;")->queryScalar();
					$model3->semester=2;
					$model3->bulanawal='Januari';
					$model3->bulanakhir='Juni';
					$model3->save();
				}
			}
			if($bulan<7){
				$smt=1;
			}elseif($bulan<13 && $bulan>5){
				$smt=2;
			}
			
			$model->attributes=$_POST['Jadwal'];
			$model->th_ajar=Yii::app()->db->createCommand("select th_ajar from semester_aktif order by th_ajar DESC limit 1;")->queryScalar();
			$model->semester= Yii::app()->db->createCommand("select semester from semester_aktif where semester='".$smt."' limit 1;")->queryScalar();
			
			try {
				if($model->save()){
					Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> disimpan.');
					$this->redirect(array('admin'));
				}
			}
			catch(CDbException $e) {
				$model->addError(null, $e->getMessage());
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$id2,$id3,$id4)
	{
		$model=$this->loadModel($id,$id2,$id3,$id4);
		$model2=new Thajar;
		$model3=new SemesterAktif;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Jadwal']))
		{
			$model->attributes=$_POST['Jadwal'];
			if($model->save())
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> diperbarui.');
				$this->redirect(array('view','id'=>$model->idruang,'id2'=>$model->idwaktu,'id3'=>$model->th_ajar,'id4'=>$model->semester));
		}

		$this->render('update',array(
			'model'=>$model,
				'model2'=>$model2,
				'model3'=>$model3,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$id2,$id3,$id4)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id,$id2,$id3,$id4)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> dihapus.');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Jadwal');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Jadwal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jadwal']))
			$model->attributes=$_GET['Jadwal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id,$id2,$id3,$id4)
	{
		$model=Jadwal::model()->findByAttributes(array('idruang'=>$id,'idwaktu'=>$id2, 'th_ajar'=>$id3, 'semester'=>$id4));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='jadwal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
