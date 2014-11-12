<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	
	$model->customer->=>array('customer/view', 'id'=>$model->customer_id),
	$model->id,
	
	//'Orders'=>array('index'),
	//$model->id,
);

$this->menu=array(
/**
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
**/	
	array('label'=>'Create Order List for Order ID# ' .$model->id , 'url'=>array('OrderList/create','order_id'=>$model->id)),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_date',
		'order_status',
		array('label'=>'Customer Name', 'value'=>$model->customer->FullName),
		'order_total',
	),
)); ?>