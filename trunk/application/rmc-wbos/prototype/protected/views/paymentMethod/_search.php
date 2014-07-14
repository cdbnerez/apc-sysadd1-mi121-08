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
		<?php echo $form->label($model,'payment_method'); ?>
		<?php echo $form->textField($model,'payment_method',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'card_no'); ?>
		<?php echo $form->textField($model,'card_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cvc_no'); ?>
		<?php echo $form->textField($model,'cvc_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'card_type'); ?>
		<?php echo $form->textField($model,'card_type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_name'); ?>
		<?php echo $form->textField($model,'bank_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'card_expire'); ?>
		<?php echo $form->textField($model,'card_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms_id'); ?>
		<?php echo $form->textField($model,'payment_terms_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->