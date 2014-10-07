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
<h1><?php echo $model->cus_company?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cus_type',
		'cus_company',
		'cus_fname',
		'cus_lname',
		'cus_user_name',
		'cus_user_passwd',
		'cus_contact_num',
	),
)); ?>

<?php $conf= Delivery::model()->findAll('customer_id = :a', array(':a'=>$model->id));?>
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


<?php $conf= Order::model()->findAll('customer_id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Order Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
			    'order_date',
				'order_total',
				'payment_total',
				'order_status',
			    //'customer_id' => 'Customer Name'
			    //array('label'=>'Person', 'value'=>$model->person->FullName),
			),
	)); ?>
<br>


<?php $conf= PaymentMethod::model()->findAll('id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Payment Method Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				//'payment_method_id',
				//array('label'=>'Payment Type', 'value'=>$conf->PaymentType),
				'bank_name',
				'payment_desc',
				'payment_type',
				
				//array('label'=>'Payment Type', 'value'=>$conf->bank_name),
			    //array('label'=>'Payment Type', 'value'=>$conf->PaymentType),
				//'payment_desc',
				//'customer_id' => 'Customer Name'
			    //array('label'=>'Person', 'value'=>$model->person->FullName),
			),
	)); ?>
<br>
<?php }} ?>
<?php }} ?>
<?php }} ?>