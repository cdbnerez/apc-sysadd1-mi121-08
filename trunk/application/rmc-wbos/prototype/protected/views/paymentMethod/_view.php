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

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_per_month')); ?>:</b>
	<?php echo CHtml::encode($data->payment_per_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_discount')); ?>:</b>
	<?php echo CHtml::encode($data->payment_discount); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_total_amount')); ?>:</b>
	<?php echo CHtml::encode($data->payment_total_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

	*/ ?>

</div>