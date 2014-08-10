<?php
/* @var $this DeliveryController */
/* @var $data Delivery */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('del_add')); ?>:</b>
	<?php echo CHtml::encode($data->del_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('del_city')); ?>:</b>
	<?php echo CHtml::encode($data->del_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('del_country')); ?>:</b>
	<?php echo CHtml::encode($data->del_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('del_zip')); ?>:</b>
	<?php echo CHtml::encode($data->del_zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer->FullName); ?>
	<br />


</div>