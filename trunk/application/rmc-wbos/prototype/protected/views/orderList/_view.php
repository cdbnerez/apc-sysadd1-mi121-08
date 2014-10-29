<?php
/* @var $this OrderListController */
/* @var $data OrderList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item->item_desc); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('item_qty')); ?>:</b>
	<?php echo CHtml::encode($data->item_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_order_total')); ?>:</b>
	<?php echo CHtml::encode($data->item_order_total); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('order_list_total_amount')); ?>:</b>
	<?php echo CHtml::encode($data->order_list_total_amount); ?>
	<br />

</div>