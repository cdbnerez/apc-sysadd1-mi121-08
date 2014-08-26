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
		<?php echo $form->labelEx($model,'order_total'); ?>
		<?php echo $form->textField($model,'order_total',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'order_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_total'); ?>
		<?php echo $form->textField($model,'payment_total',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'payment_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_status'); ?>
		
		<?php echo $form->dropDownList($model,'order_status',array("Approved"=>"Approved", "Denied"=>"Denied", "Pending"=>"Pending")
		,array('empty'=>'Select Order Status')); ?>
		
		<?php echo $form->error($model,'order_status'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->labelEx($model,'customer_id'); ?>
		
		<?php echo $form->dropDownList($model, 'customer_id', CHtml::listData(
		Customer::model()->findAll(), 'id', 'FullName'),
		array('prompt' => 'Select a customer last name')
		); ?>
		
		<?php echo $form->error($model,'customer_id'); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_id'); ?>
		
		<?php echo $form->dropDownList($model, 'delivery_id', CHtml::listData(
		Delivery::model()->findAll(), 'id', 'del_add'),
		array('prompt' => 'Select a delivery address')
		); ?>
	
		<?php echo $form->error($model,'delivery_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_method_id'); ?>
		
		<?php echo $form->dropDownList($model, 'payment_method_id', CHtml::listData(
		PaymentMethod::model()->findAll(), 'id', 'id'),
		array('prompt' => 'Select a Payment Method')
		); ?>
				
		<?php echo $form->error($model,'payment_method_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->