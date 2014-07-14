<?php
/* @var $this ItemInventoryController */
/* @var $model ItemInventory */

$this->breadcrumbs=array(
	'Item Inventories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemInventory', 'url'=>array('index')),
	array('label'=>'Create ItemInventory', 'url'=>array('create')),
	array('label'=>'View ItemInventory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ItemInventory', 'url'=>array('admin')),
);
?>

<h1>Update ItemInventory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>