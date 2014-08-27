<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-terms-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_terms'); ?>
		
		<?php echo $form->dropDownList($model,'pay_terms',array(0=>0 . " Months", 1=>1 . " Months", 3=>3 . " Months", 6=>6 ." Months", 9=>9 ." Months")
		,array('empty'=>'Select Payment Term')); ?>
		
		<?php echo $form->error($model,'pay_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_per_month'); ?>
		<?php echo $form->textField($model,'pay_per_month'); ?>
		<?php echo $form->error($model,'pay_per_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_discount'); ?>
		<?php echo $form->textField($model,'pay_discount'); ?>
		<?php echo $form->error($model,'pay_discount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->