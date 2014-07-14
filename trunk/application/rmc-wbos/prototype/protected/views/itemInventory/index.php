<?php
/* @var $this ItemInventoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Item Inventories',
);

$this->menu=array(
	array('label'=>'Create ItemInventory', 'url'=>array('create')),
	array('label'=>'Manage ItemInventory', 'url'=>array('admin')),
);
?>

<h1>Item Inventories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
