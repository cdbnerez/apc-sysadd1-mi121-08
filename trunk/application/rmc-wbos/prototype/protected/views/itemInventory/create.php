<?php
/* @var $this ItemInventoryController */
/* @var $model ItemInventory */

$this->breadcrumbs=array(
	'Item Inventories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ItemInventory', 'url'=>array('index')),
	array('label'=>'Manage ItemInventory', 'url'=>array('admin')),
);
?>

<h1>Create ItemInventory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>