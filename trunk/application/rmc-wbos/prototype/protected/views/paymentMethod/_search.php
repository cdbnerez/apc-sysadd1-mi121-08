<?php
/* @var $this PaymentMethodController */
/* @var $model PaymentMethod */
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
		<?php echo $form->label($model,'payment_type'); ?>
		<?php echo $form->textField($model,'payment_type',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_desc'); ?>
		<?php echo $form->textField($model,'payment_desc',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_name'); ?>
		<?php echo $form->textField($model,'bank_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms'); ?>
		<?php echo $form->textField($model,'payment_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_per_month'); ?>
		<?php echo $form->textField($model,'payment_per_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_discount'); ?>
		<?php echo $form->textField($model,'payment_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_total_amount'); ?>
		<?php echo $form->textField($model,'payment_total_amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->