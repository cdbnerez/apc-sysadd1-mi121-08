<?php
/* @var $this CustomerController */
/* @var $model Customer */
$this->breadcrumbs=array(
		
	'Customers'=>array('index'),
	$model->FullName,
);
$this->menu=array(
	/**
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
	**/
	
	array('label'=>'Create Order for ' .$model->FullName, 'url'=>array('order/create','customer_id'=>$model->id)),
	
	
);
?>

<h1 align = center><?php echo $model->cus_company?><?php echo ' -'?> <?php echo $model->FullName?></h1>
<br>
<h2>Customer Information</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cus_type',
		'cus_company',
		'cus_fname',
		'cus_lname',
		'cus_user_name',
		//'cus_user_passwd',
		'cus_contact_num',
	),
)); ?>

<?php $conf= Order::model()->findAll('customer_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Order Information</h2>
<?php foreach ($conf as $row) { ?>
<?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/update.png" align="right"/>', 
array('order/update', 'id'=>$row->id)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
			    'id',
				'order_date',
				'order_status',
				'order_total',
			    
			),
	)); ?>
<br>

<?php $conf= OrderList::model()->findAll('order_id = :a', array(':a'=>$row->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Order List Information</h2>
<?php foreach ($conf as $row2) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row2,
	        'attributes'=>array(   
				'order_id',
				'item_qty',
				array('label'=>'Item Description', 'value'=>$row2->item->item_desc),
				'item_order_total',
			),
	)); ?>
<br>
<?php }} ?>

<?php $conf= PaymentMethod::model()->findAll('order_id = :a', array(':a'=>$row->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Payment Information</h2>
<?php foreach ($conf as $row3) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row3,
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

<?php $conf= Delivery::model()->findAll('order_id = :a', array(':a'=>$row->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Delivery Information</h2>
<?php foreach ($conf as $row4) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row4,
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
<?php }} ?>
