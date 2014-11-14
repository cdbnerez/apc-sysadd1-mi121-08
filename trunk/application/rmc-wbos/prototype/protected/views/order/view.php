<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	
	//$model->customer->id=>array('customer/view', 'id'=>$model->customer_id),
	//$model->id,
	
	'Orders'=>array('index'),
	$model->id,
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

<h1>Order #<?php echo $model->id; ?> Information</h1>

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

<?php $conf= OrderList::model()->findAll('order_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Order List Information</h2>
<?php foreach ($conf as $row) { ?>
<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', array('OrderList/update', 'id'=>$row->id)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				'order_id',
				'item_qty',
				array('label'=>'Item Description', 'value'=>$row->item->item_desc),
				'item_order_total',
			),
	)); ?>
<br>
<?php }} ?>

<?php $conf= PaymentMethod::model()->findAll('order_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Payment Information</h2>
<?php foreach ($conf as $row) { ?>
<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', array('paymentMethod/update', 'id'=>$row->id)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				'order_id',
				'payment_type',
				'payment_desc',
				'bank_name',
				'payment_desc',
				'payment_terms',
			    'payment_per_month',
			    'payment_discount',
			    'payment_total_amount',
			),
	)); ?>
<br>
<?php }} ?>

<?php $conf= Delivery::model()->findAll('order_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Delivery Information</h2>
<?php foreach ($conf as $row) { ?>
<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', array('delivery/update', 'id'=>$row->id)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   	
			    'del_add',
			    'del_city',
			    'del_country',
			    'del_zip',
			    //'customer_id' => 'Customer Name'
			    //array('label'=>'Person', 'value'=>$model->person->FullName),
			),
	)); ?>
<br>
<?php }} ?>