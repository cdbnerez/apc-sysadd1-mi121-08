<?php

class OrderController extends Controller
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
                        
                        /*
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions'=>array('admin','delete'),
                                'users'=>array('admin'),
                        ),*/
                        
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
                $model=new Order;
                $model->customer_id = Yii::app()->getRequest()->getParam('customer_id');

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Order']))
                {
                        $model->attributes=$_POST['Order'];
                        $model->save();
                        
                        $ol=new Logs;
                        $ol->customer_id= Yii::app()->user->id;
                        $ol->date= date('Y-m-d H:i:s');
                        $ol->description= "New order entry created: Order #<a href=/prototype/index.php?r=order/view&id=". $model->id . ">" . $model->id . "</a>";

                        if($ol->save())
                                $this->redirect(array('view','id'=>$model->id));
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

                if(isset($_POST['Order']))
                {
                        /**
                        $model->attributes=$_POST['Order'];
                        
                        $ol=new logs;
            $ol->customer_id= Yii::app()->user->id;
            $ol->date= date('Y-m-d H:i:s');
            $ol->description= "An order entry was updated ";
                        
                        if($model->save()&&$ol->save())
                                $this->redirect(array('view','id'=>$model->id));
                        **/     
                                
                        $model->attributes=$_POST['Order'];
                        $model->save();
                        
                        $ol=new Logs;
                        $ol->customer_id= Yii::app()->user->id;
                        $ol->date= date('Y-m-d H:i:s');
                        $ol->description= "Order #<a href=/prototype/index.php?r=order/view&id=". $model->id . ">" . $model->id . "</a> has been updated";

                        if($ol->save())
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
                //--------------------
                        $ol=new Logs;
                        $ol->customer_id= Yii::app()->user->id;
                        $ol->date= date('Y-m-d H:i:s');
                        $ol->description= "Order # " . $id . " has been deleted";
                        $ol->save();
                //--------------------
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex()
        {
                $dataProvider=new CActiveDataProvider('Order');
                $this->render('index',array(
                        'dataProvider'=>$dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin()
        {
                $model=new Order('search');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Order']))
                        $model->attributes=$_GET['Order'];

                $this->render('admin',array(
                        'model'=>$model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Order the loaded model
         * @throws CHttpException
         */
        public function loadModel($id)
        {
                $model=Order::model()->findByPk($id);
                
                //for math operation
                //$model->order_total = $model->orderList->item_order_total;
                        
                if($model===null)
                        throw new CHttpException(404,'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Order $model the model to be validated
         */
        protected function performAjaxValidation($model)
        {
                if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
                {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }
}