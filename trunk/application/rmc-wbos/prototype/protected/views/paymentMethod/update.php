<?php
/* @var $this PaymentMethodController */
/* @var $model PaymentMethod */

$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
	array('label'=>'View PaymentMethod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PaymentMethod', 'url'=>array('admin')),
);
?>

<h1>Update PaymentMethod <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>