<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */

$this->breadcrumbs=array(
	'Payment Terms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PaymentTerms', 'url'=>array('index')),
	array('label'=>'Manage PaymentTerms', 'url'=>array('admin')),
);
?>

<h1>Create PaymentTerms</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>