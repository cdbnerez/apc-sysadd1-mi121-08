<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_type')); ?>:</b>
	<?php echo CHtml::encode($data->cus_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_company')); ?>:</b>
	<?php echo CHtml::encode($data->cus_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_fname')); ?>:</b>
	<?php echo CHtml::encode($data->cus_fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_lname')); ?>:</b>
	<?php echo CHtml::encode($data->cus_lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_user_name')); ?>:</b>
	<?php echo CHtml::encode($data->cus_user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_user_passwd')); ?>:</b>
	<?php echo CHtml::encode($data->cus_user_passwd); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cus_contact_num')); ?>:</b>
	<?php echo CHtml::encode($data->cus_contact_num); ?>
	<br />

	*/ ?>

</div>