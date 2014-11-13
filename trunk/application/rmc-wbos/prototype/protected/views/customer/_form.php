<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	<?php
	require_once 'Mobile_Detect.php';
	
	
	$detect = new Mobile_Detect;
	
	if ($detect->isMobile() ) {
	echo '<p> MOBILE </p>';
	}
	?>
	
	 <div class="row">
                <?php echo $form->labelEx($model,'cus_type'); ?>
        
            <?php echo $form->dropDownList($model,'cus_type',array("Retail"=>"Retail", "Wholesale"=>"Wholesale", "Walk-In"=>"Walk-In", "System Admin"=>"System Admin")
                ,array('empty'=>'Select Customer Type')); ?>
        
                <?php echo $form->error($model,'cus_type'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'cus_company'); ?>
                <?php echo $form->textField($model,'cus_company',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'cus_company'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'cus_fname'); ?>
                <?php echo $form->textField($model,'cus_fname',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'cus_fname'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'cus_lname'); ?>
                <?php echo $form->textField($model,'cus_lname',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'cus_lname'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'cus_user_name'); ?>
                <?php echo $form->textField($model,'cus_user_name',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'cus_user_name'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'cus_user_passwd'); ?>
                <?php echo $form->textField($model,'cus_user_passwd',array('size'=>45,'maxlength'=>45, 'beforeSave')); ?>
                <?php echo $form->error($model,'cus_user_passwd'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'cus_contact_num'); ?>
                <?php echo $form->textField($model,'cus_contact_num',array('size'=>45,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'cus_contact_num'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->