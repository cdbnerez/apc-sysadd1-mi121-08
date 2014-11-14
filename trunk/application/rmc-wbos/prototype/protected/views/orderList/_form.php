<?php
/* @var $this OrderListController */
/* @var $model OrderList */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-list-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->labelEx($model,$model->order_id); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'item_id'); ?>
		
		<?php echo $form->dropDownList($model, 'item_id', CHtml::listData(
		Item::model()->findAll(), 'id', 'item_desc'),
		array('prompt' => 'Select an Item')
		); ?>
		
		<?php echo $form->error($model,'item_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'item_qty'); ?>
		<?php echo $form->textField($model,'item_qty'); ?>
		<?php echo $form->error($model,'item_qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_order_total'); ?>
		
		
		<?php //echo $form->textField($model,'item_order_total',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->textField($model,'TotalAmount', array('disabled'=>'disabled')); ?>
		
		<?php echo $form->error($model,'item_order_total'); ?>
	</div>
    
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->