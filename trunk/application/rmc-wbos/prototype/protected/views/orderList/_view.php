<?php
/* @var $this OrderListController */
/* @var $data OrderList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_qty')); ?>:</b>
	<?php echo CHtml::encode($data->item_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_inventory_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_inventory_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />


</div>