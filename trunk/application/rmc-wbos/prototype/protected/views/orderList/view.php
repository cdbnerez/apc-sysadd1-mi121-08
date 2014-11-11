<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
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
	
	array('label'=>'Create Payment Method for Order List ID# ' .$model->id , 'url'=>array('PaymentMethod/create','orderList_id'=>$model->id)),
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
		'item_order_total',
		//'order_list_total_amount',
	),
)); ?>