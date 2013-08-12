<?php

class PresensiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
	/*public function accessRules()
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
	}*/

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
		$this->layout='//layouts/column1';
		//Action search dialog
		$model2=new Penempatan('gurupiket');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Penempatan']))
			$model2->attributes=$_GET['Penempatan'];
		
		//Action create
		$model=new Presensi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Presensi']))
		{
			$model->attributes=$_POST['Presensi'];
			try {
				if($model->save()){
					if($model->tanggal==date('Y-m-d')){
						$model->save();
						Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> disimpan.');
						$this->redirect(array('index'));
					}else{
						Yii::app()->user->setFlash('error', '<strong>Input tanggal maksimal hari ini.</strong> Terima Kasih');
						$model->addError(null, "Input tanggal maksimal hari ini. Terima Kasih"/*$e->getMessage()*/);
					}
				}
			}
			catch(CDbException $e) {
				Yii::app()->user->setFlash('warning', 'Maaf <strong>data sudah ada dalam database</strong>. Silahkan periksa kembali');
				//$model->addError(null, $e->getMessage());
				$model->addError(null, "Maaf <strong>data sudah ada dalam database</strong>. Silahkan periksa kembali");
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$id2,$id3,$id4)
	{
		$this->layout='//layouts/column1';
		$model=$this->loadModel($id,$id2,$id3,$id4);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Presensi']))
		{
			$model->attributes=$_POST['Presensi'];
			if($model->save())
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> diperbarui. Terima kasih');
				$this->redirect(array('view','id'=>$model->nis, 'id2'=>$model->tanggal, 'id3'=>$model->th_ajar, 'id4'=>$model->semester));
		}

		$this->render('update',array(
			'model'=>$model,
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
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> dihapus. Terima kasih');
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
		$this->layout='//layouts/column1';
		$model=new Presensi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presensi']))
			$model->attributes=$_GET['Presensi'];
		
		$dataProvider=new CActiveDataProvider('Presensi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionArsip()
	{
		$this->layout='//layouts/column1';
		$model=new Presensi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presensi'])){
			if(($_GET['Presensi']['nis'])==0 && ($_GET['Presensi']['nis'])!=null){
				$model->attributes=$_GET['Presensi'];
				Yii::app()->user->setFlash('warning', 'Data gagal diproses. <b>NIS</b> tidak boleh kosong atau 0');
			}else{
				$model->attributes=$_GET['Presensi'];
				Yii::app()->user->setFlash('success', 'Data berhasil diproses. Terima kasih');
			}
		}else $model->nis = 0;

		$this->render('arsip',array(
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
		$model=Presensi::model()->findByPk(array('nis'=>$id,'tanggal'=>$id2, 'th_ajar'=>$id3, 'semester'=>$id4));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='presensi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
