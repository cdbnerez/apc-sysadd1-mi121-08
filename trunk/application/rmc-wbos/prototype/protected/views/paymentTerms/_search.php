<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_terms'); ?>
		<?php echo $form->textField($model,'pay_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_per_month'); ?>
		<?php echo $form->textField($model,'pay_per_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_discount'); ?>
		<?php echo $form->textField($model,'pay_discount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->