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
		
		<?php echo $form->dropDownList($model,'payment_type',array("INS"=>"ins", "CASH"=>"cash", "CARD"=>"card")
		,array('empty'=>'Select Payment Type')); ?>
		
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_desc'); ?>
		
		<?php echo $form->dropDownList($model,'payment_desc',array("INSTALMENT"=>"instalment", "CASH"=>"cash", "CARD"=>"card")
		,array('empty'=>'Select Payment Description')); ?>
		
		<?php echo $form->error($model,'payment_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_method'); ?>
		
		<?php echo $form->dropDownList($model,'payment_method',array("INSTALMENT"=>"instalment", "CASH"=>"cash", "CARD"=>"card")
		,array('empty'=>'Select Payment Method')); ?>
		
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
		
		<?php echo $form->dropDownList($model,'card_type',array("DEBIT"=>"Debit", "CREDIT"=>"Credit")
		,array('empty'=>'Select Card Type')); ?>
		
		<?php echo $form->error($model,'card_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_name'); ?>
		
		<?php echo $form->dropDownList($model,'bank_name',array("BDO"=>"Banco De Oro", "Robinsons"=>"Robinsons Bank", "BPI"=>"Bank of the Philippine Islands")
		,array('empty'=>'Select Bank Name')); ?>
		
		<?php echo $form->error($model,'bank_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_expire'); ?>
		<?php echo $form->textField($model,'card_expire'); ?>
		<?php echo $form->error($model,'card_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_terms_id'); ?>
		
		<?php echo $form->dropDownList($model, 'payment_terms_id', CHtml::listData(
		PaymentTerms::model()->findAll(), 'id', 'id'),
		array('prompt' => 'Select a Payment ID')
		); ?>
		
		<?php echo $form->error($model,'payment_terms_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->