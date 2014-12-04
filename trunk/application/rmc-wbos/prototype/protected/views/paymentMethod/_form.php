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
		<?php echo $form->labelEx($model,'order_id'); ?>
		
		<?php echo $form->labelEx($model,$model->order_id); ?>
		
		<!-- gene's code -->
		<?php //echo $form->textField($model,'order_id', array('disabled'=>'disabled')); ?>
		
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		
		<?php echo $form->dropDownList($model,'payment_type',array("CASH"=>"Cash", "Cheque"=>"Cheque")
		,array('empty'=>'Select Payment Type')); ?>
		
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_desc'); ?>
		
		<?php echo $form->dropDownList($model,'payment_desc',array("Cash (Straight)"=>"Cash (Straight)", "Cash (Cash Upon Delivery)"=>"Cash (Cash Upon Delivery)", "Cheque"=>"Cheque", "Cash (Terms)"=>"Cash (Terms)")
		,array('empty'=>'Select Payment Description')); ?>
		
		<?php echo $form->error($model,'payment_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_name'); ?>
		
		<?php echo $form->dropDownList($model,'bank_name',array("BDO"=>"Banco De Oro", "Robinsons"=>"Robinsons Bank", "BPI"=>"Bank of the Philippine Islands")
		,array('empty'=>'Select Bank Name')); ?>
		
		<?php echo $form->error($model,'bank_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_terms'); ?>
		
		<?php echo $form->dropDownList($model,'payment_terms',array(1=>"Straight Payment", 30=>"30 Days", 60=>"60 Days", 90 => "90 Days")
		,array('empty'=>'Select Bank Name')); ?>
		
		<?php echo $form->error($model,'payment_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_discount'); ?>
		<?php echo $form->textField($model,'payment_discount'); ?>
		<?php echo $form->error($model,'payment_discount'); ?>
	</div>
	
	<?php /**
	<div class="row">
		<?php echo $form->labelEx($model,'payment_per_month'); ?>
		<?php echo $form->textField($model,'payment_per_month'); ?>
		<?php echo $form->error($model,'payment_per_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_total_amount'); ?>
		<?php echo $form->textField($model,'payment_total_amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'payment_total_amount'); ?>
	</div>
    **/ ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'payment_total_amount'); ?>	
	<?php echo $form->labelEx($model,$model->order->order_total); ?>		
	<?php echo $form->error($model,'payment_total_amount'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->