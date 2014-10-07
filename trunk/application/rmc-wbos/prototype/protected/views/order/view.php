<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_date',
		'order_total',
		'payment_total',
		'order_status',
		array('label'=>'Customer Name', 'value'=>$model->customer->FullName),
		array('label'=>'Customer Delivery Address', 'value'=>$model->delivery->FullAddress),
		'payment_method_id',
	),
)); ?>

<<<<<<< HEAD
=======

>>>>>>> 3ac281dce9a0bf833acd750656c4aa2b15c80637
