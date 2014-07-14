<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_date')); ?>:</b>
	<?php echo CHtml::encode($data->order_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_total')); ?>:</b>
	<?php echo CHtml::encode($data->order_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_total')); ?>:</b>
	<?php echo CHtml::encode($data->payment_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_status')); ?>:</b>
	<?php echo CHtml::encode($data->order_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_id')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_method_id')); ?>:</b>
	<?php echo CHtml::encode($data->payment_method_id); ?>
	<br />

	*/ ?>

</div>