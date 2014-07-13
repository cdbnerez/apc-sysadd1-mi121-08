<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */

$this->breadcrumbs=array(
	'Payment Terms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaymentTerms', 'url'=>array('index')),
	array('label'=>'Create PaymentTerms', 'url'=>array('create')),
	array('label'=>'View PaymentTerms', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PaymentTerms', 'url'=>array('admin')),
);
?>

<h1>Update PaymentTerms <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>