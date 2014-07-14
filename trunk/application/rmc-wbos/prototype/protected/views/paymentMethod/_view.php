<?php
/* @var $this PaymentMethodController */
/* @var $data PaymentMethod */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_type')); ?>:</b>
	<?php echo CHtml::encode($data->payment_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_desc')); ?>:</b>
	<?php echo CHtml::encode($data->payment_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_method')); ?>:</b>
	<?php echo CHtml::encode($data->payment_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('card_no')); ?>:</b>
	<?php echo CHtml::encode($data->card_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cvc_no')); ?>:</b>
	<?php echo CHtml::encode($data->cvc_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('card_type')); ?>:</b>
	<?php echo CHtml::encode($data->card_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('card_expire')); ?>:</b>
	<?php echo CHtml::encode($data->card_expire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms_id')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms_id); ?>
	<br />

	*/ ?>

</div>