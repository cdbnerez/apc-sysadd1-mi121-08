<?php
/* @var $this PaymentMethodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payment Methods',
);

$this->menu=array(
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
	array('label'=>'Manage PaymentMethod', 'url'=>array('admin')),
	//array('label'=>'List PaymentMethod', 'url'=>array('index'))
);
?>

<h1>Payment Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
