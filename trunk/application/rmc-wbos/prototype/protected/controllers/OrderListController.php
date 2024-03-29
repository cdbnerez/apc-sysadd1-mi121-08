<?php

class OrderListController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) &&
					((Yii::app()->user->type==="Sytem Admin"))'
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OrderList;
		$model->order_id = Yii::app()->getRequest()->getParam('order_id');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['OrderList']))
		{
			$model->attributes=$_POST['OrderList'];
			
			//for math operation
			$model->item_order_total = $model->item_qty * $model->item->item_price;
			
			if($model->save())
			$model->save();
			
			$old=new Logs;
            $old->customer_id= Yii::app()->user->id;
            $old->date= date('Y-m-d H:i:s');
			$old->description= "New orderlist entry created: Orderlist #<a href=/prototype/index.php?r=orderList/view&id=". $model->id . ">" . $model->id . "</a>";

			if($old->save())

				$this->redirect(array('order/view','id'=>$model->order->id));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrderList']))
		{
			$model->attributes=$_POST['OrderList'];
			//for math operation
			$model->item_order_total = $model->item_qty * $model->item->item_price;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));

			$model->save();
			
			$old=new Logs;
            $old->customer_id= Yii::app()->user->id;
            $old->date= date('Y-m-d H:i:s');
			$old->description= "Orderlist #<a href=/prototype/index.php?r=orderList/view&id=". $model->id . ">" . $model->id . "</a> has been updated";

			if($old->save())
			$this->redirect(array('view','id'=>$model->id));	

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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
			$old=new Logs;
            $old->customer_id= Yii::app()->user->id;
            $old->date= date('Y-m-d H:i:s');
			$old->description= "Orderlist # " . $id . " has been deleted";
			$old->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OrderList');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrderList('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrderList']))
			$model->attributes=$_GET['OrderList'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OrderList the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OrderList::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OrderList $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-list-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
