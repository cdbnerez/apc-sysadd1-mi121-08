<?php
/* @var $this MycommentController */
/* @var $model Mycomment */

$this->breadcrumbs=array(
	'Mycomments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mycomment', 'url'=>array('index')),
	array('label'=>'Manage Mycomment', 'url'=>array('admin')),
);
?>

<h1>Create Mycomment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>