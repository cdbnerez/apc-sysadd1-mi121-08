
<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->cus_company?><?php echo ' -'?> <?php echo $model->FullName?></h1>

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

<?php $conf= Delivery::model()->findAll('order_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Delivery Information</h2>
<?php foreach ($conf as $row) { ?>
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

<?php $conf= PaymentMethod::model()->findAll('order_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Payment Method Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				'payment_type',
				'bank_name',
				'payment_desc',
			),
	)); ?>
<br>
<?php }} ?>

<?php $conf= Order::model()->findAll('customer_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Order Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
			    'order_date',
				'order_status',
			    
			),
	)); ?>
<br>
<?php }} ?>

<?php $conf= OrderList::model()->findAll('order_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>OrderList Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				'item_qty',
				array('label'=>'Item Description', 'value'=>$row->item->item_desc),
				//'item_id',
				'order_list_total_amount',
			),
	)); ?>
<br>
<?php }} ?>