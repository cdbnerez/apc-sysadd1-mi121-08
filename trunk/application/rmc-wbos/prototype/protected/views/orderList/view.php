<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	
	//$model->order->order_list->id=>array('order_list/view', 'id'=>$model->order_list_id),
	//$model->id,
	
	'Order Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	/**
	array('label'=>'List OrderList', 'url'=>array('index')),
	array('label'=>'Create OrderList', 'url'=>array('create')),
	array('label'=>'Update OrderList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
	*/
	
	array('label'=>'Create Payment Method for Order List ID# ' .$model->id , 'url'=>array('PaymentMethod/create','order_id'=>$model->order_id)),
);
?>

<h1>View OrderList #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		array('label'=>'Customer Name', 'value'=>$model->item->item_desc),
		'item_qty',
		array('label'=>'Item Order Total', 'value'=>$model->item_qty * $model->item->item_price),
		//'item_order_total'array('label'=>'Item Order Total', 'value'=>$model->item_qty * $model->item->item_price),
		//'order_list_total_amount',
	),
)); ?>