<?php
/* @var $this PaymentMethodController */
/* @var $model PaymentMethod */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-method-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		<?php echo $form->textField($model,'payment_type',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_desc'); ?>
		<?php echo $form->textField($model,'payment_desc',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payment_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_method'); ?>
		<?php echo $form->textField($model,'payment_method',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payment_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_no'); ?>
		<?php echo $form->textField($model,'card_no'); ?>
		<?php echo $form->error($model,'card_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cvc_no'); ?>
		<?php echo $form->textField($model,'cvc_no'); ?>
		<?php echo $form->error($model,'cvc_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_type'); ?>
		<?php echo $form->textField($model,'card_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'card_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_name'); ?>
		<?php echo $form->textField($model,'bank_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'bank_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_expire'); ?>
		<?php echo $form->textField($model,'card_expire'); ?>
		<?php echo $form->error($model,'card_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_terms_id'); ?>
		<?php echo $form->textField($model,'payment_terms_id'); ?>
		<?php echo $form->error($model,'payment_terms_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->