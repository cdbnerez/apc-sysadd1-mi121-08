<?php
/* @var $this DeliveryController */
/* @var $model Delivery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'del_add'); ?>
		<?php echo $form->textField($model,'del_add',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'del_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'del_city'); ?>
		<?php echo $form->textField($model,'del_city',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'del_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'del_country'); ?>
		<?php echo $form->textField($model,'del_country',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'del_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'del_zip'); ?>
		<?php echo $form->textField($model,'del_zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'del_zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->