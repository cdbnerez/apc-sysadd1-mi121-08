<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	'Order Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderList', 'url'=>array('index')),
	array('label'=>'Create OrderList', 'url'=>array('create')),
	array('label'=>'Update OrderList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
);
?>


<h1>View Orderlist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_qty',
		array('label'=>'Item Description', 'value'=>$model->itemInventory->item_desc),
		'order_id',
	),
)); ?>

<?php $conf= ItemInventory::model()->findAll('id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Item List Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				'item_desc',
				'item_price',
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
			'cus_type',
			'cus_company',
			'cus_fname',
			'cus_lname',
			'cus_contact_num',
			),
	)); ?>
<br>

<?php }} ?>
<?php }} ?>
