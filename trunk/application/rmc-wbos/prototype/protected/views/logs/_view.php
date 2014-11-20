<?php
/* @var $this LogsController */
/* @var $data Logs */
?>

<div class="view">
<?php /*

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />-->
*/?>

<div class="posttext">

<?php
$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
       echo $data->description ." by " .CHtml::link(CHtml::encode($data->customer->cus_lname . ", ". $data->customer->cus_fname), array('customer/view', 'id'=>$data->customer_id)) ." at " .$data->date
	   . " Order ID " .CHtml::link(CHtml::encode($data->order->id), array('order/view', 'id'=>$data->order->id)); 
       $this->endWidget();?>
</div>

</div>