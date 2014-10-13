<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */

$this->breadcrumbs=array(
	'Payment Terms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PaymentTerms', 'url'=>array('index')),
	array('label'=>'Create PaymentTerms', 'url'=>array('create')),
	array('label'=>'Update PaymentTerms', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PaymentTerms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaymentTerms', 'url'=>array('admin')),
);
?>

<h1>View PaymentTerms #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pay_terms',
		'pay_per_month',
		'pay_discount',
	),
)); ?>

<?php $conf= PaymentMethod::model()->findAll('id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Payment Method Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(  
			    'payment_type',
			    'payment_desc',
			    'bank_name',
			    'payment_terms_id',
		    ),
	)); ?>
<br>

<?php $conf= Customer::model()->findAll('id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Customer Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
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
<br>
<?php }} ?>
<?php }} ?>
