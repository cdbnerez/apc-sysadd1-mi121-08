<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	'Order Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List OrderList', 'url'=>array('index')),
	//array('label'=>'Manage OrderList', 'url'=>array('admin')),
	array('label'=>'Cancel Order List Entry', 'url'=>array('order/view','id'=>$model->order->id))
);
?>

<h1>Create OrderList</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>