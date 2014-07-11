<?php
/* @var $this ItemInventoryController */
/* @var $data ItemInventory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_desc')); ?>:</b>
	<?php echo CHtml::encode($data->item_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_price')); ?>:</b>
	<?php echo CHtml::encode($data->item_price); ?>
	<br />


</div>