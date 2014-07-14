<?php
/* @var $this PaymentTermsController */
/* @var $data PaymentTerms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_terms')); ?>:</b>
	<?php echo CHtml::encode($data->pay_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_per_month')); ?>:</b>
	<?php echo CHtml::encode($data->pay_per_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_discount')); ?>:</b>
	<?php echo CHtml::encode($data->pay_discount); ?>
	<br />


</div>