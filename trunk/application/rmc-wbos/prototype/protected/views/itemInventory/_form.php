<?php
/* @var $this ItemInventoryController */
/* @var $model ItemInventory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-inventory-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'item_desc'); ?>
		<?php echo $form->textField($model,'item_desc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'item_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_price'); ?>
		<?php echo $form->textField($model,'item_price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'item_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->