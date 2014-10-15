<?php
/* @var $this ItemInventoryController */
/* @var $model ItemInventory */

$this->breadcrumbs=array(
	'Item Inventories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ItemInventory', 'url'=>array('index')),
	array('label'=>'Create ItemInventory', 'url'=>array('create')),
	array('label'=>'Update ItemInventory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ItemInventory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemInventory', 'url'=>array('admin')),
);
?>

<h1>View ItemInventory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_desc',
		'item_price',
	),
)); ?>

<?php $conf= Customer::model()->findAll('id = :a', array(':a'=>$model->id));?>
<?php if (count($conf) !== 0){?>
<br>
<h2>Customer Information</h2>
<?php foreach ($conf as $row) { ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	        'data'=>$row,
	        'attributes'=>array(   
				'cus_fname',
				'cus_lname',
				'cus_type',
				'cus_contact_num',
			),
	)); ?>
<br>

<?php }} ?>


