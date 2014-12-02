<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_date'); ?>
		
		<?php echo CHtml::activeTextField($model,'order_date',array("id"=>"order_date")); ?>
		<?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'order_date',
        'ifFormat'=>'%Y-%m-%d',
		));
		?>
		
		<?php echo $form->error($model,'order_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_status'); ?>
		
		<?php echo $form->dropDownList($model,'order_status',array("Approved"=>"Approved", "Denied"=>"Denied", "Pending"=>"Pending")
		,array('empty'=>'Select Order Status')); ?>
		
		<?php echo $form->error($model,'order_status'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->labelEx($model,$model->customer->FullName); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	
	</div>
	
	
	<div class="row">
	<?php 
	/**
        <?php echo $form->labelEx($model,'order_total'); ?>
        <?php echo $form->textField($model,'order_total',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'order_total'); ?>
    */
	?>
	</div>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->