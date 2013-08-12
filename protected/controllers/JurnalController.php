<?php

class JurnalController extends Controller
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
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id,$id2,$id3,$id4,$id5)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id,$id2,$id3,$id4,$id5),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='//layouts/column1';
		$model=new Jurnal;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Jurnal']))
		{
			if((($_POST['Jurnal']['pertemuan'])==16) || (($_POST['Jurnal']['pertemuan'])=="")){
				$model->attributes=$_POST['Jurnal'];
				$model->pertemuan=1;
			}
			elseif((($_POST['Jurnal']['pertemuan'])>0) && (($_POST['Jurnal']['pertemuan'])<16) && (($_POST['Jurnal']['pertemuan'])!="")){
				$model->attributes=$_POST['Jurnal'];
				$model->pertemuan=($_POST['Jurnal']['pertemuan'])+1;
			}
			$valid=$model->validate();
			try {
				if($valid){
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
				Yii::app()->user->setFlash('warning', '<strong>Data sudah ada dalam database.</strong> Silahkan periksa kembali.');
				$model->addError(null, "Data sudah ada dalam database. Silahkan periksa kembali"/*$e->getMessage()*/);
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$id2,$id3,$id4,$id5)
	{
		$this->layout='//layouts/column1';
		$model=$this->loadModel($id,$id2,$id3,$id4,$id5);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Jurnal']))
		{
			$model->attributes=$_POST['Jurnal'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idruang, 'id2'=>$model->idwaktu, 'id3'=>$model->th_ajar, 'id4'=>$model->semester, 'id5'=>$model->tanggal));
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
	public function actionDelete($id,$id2,$id3,$id4,$id5)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id,$id2,$id3,$id4,$id5)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
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
		$model=new Jurnal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jurnal']))
			$model->attributes=$_GET['Jurnal'];
		
		$dataProvider=new CActiveDataProvider('Jurnal');
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
		$model=new Jurnal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jurnal'])){
			if(($_GET['Jurnal']['idruang'])==0 && ($_GET['Jurnal']['idruang'])!=null){
				$model->attributes=$_GET['Jurnal'];
				Yii::app()->user->setFlash('warning', 'Data gagal diproses. Silahkan pilih kata kunci');
			}else{
				$model->attributes=$_GET['Jurnal'];
				Yii::app()->user->setFlash('success', 'Data berhasil diproses. Terima kasih');
			}
		}else $model->idruang = '--Pilih Ruang--';

		$this->render('arsip',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id,$id2,$id3,$id4,$id5)
	{
		$model=Jurnal::model()->findByPk(array('idruang'=>$id,'idwaktu'=>$id2, 'th_ajar'=>$id3, 'semester'=>$id4, 'tanggal'=>$id5));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='jurnal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
