<?php
/* @var $this PaymentMethodController */
/* @var $model PaymentMethod */

$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	$model->id,
);

$this->menu=array(
	/*
	array('label'=>'List PaymentMethod', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
	array('label'=>'Update PaymentMethod', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PaymentMethod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaymentMethod', 'url'=>array('admin')),
	*/
	
	array('label'=>'Create Delivery Address for Payment Method ID# ' .$model->id , 'url'=>array('delivery/create','order_id'=>$model->order_id)),
);
?>

<h1>View PaymentMethod #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'payment_type',
		'payment_desc',
		'bank_name',
		'payment_terms',
		//array('label'=>'Payment Per Month', 'value'=>$model->item_qty * $model->item->item_price),
		'payment_per_month',
		'payment_discount',
		'payment_total_amount',
		'order_id',
	),
)); ?>