<?php
/* @var $this MyaddressController */
/* @var $model Myaddress */

$this->breadcrumbs=array(
	'Myaddresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Myaddress', 'url'=>array('index')),
	array('label'=>'Create Myaddress', 'url'=>array('create')),
	array('label'=>'View Myaddress', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Myaddress', 'url'=>array('admin')),
);
?>

<h1>Update Myaddress <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>