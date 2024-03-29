<?php
/* @var $this PaymentMethodController */
/* @var $model PaymentMethod */

$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#payment-method-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Payment Methods</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-method-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'payment_type',
		'payment_desc',
		'bank_name',
		'payment_terms',
		'payment_per_month',
		'order_id',
		/*
		'payment_discount',
		'payment_total_amount',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
