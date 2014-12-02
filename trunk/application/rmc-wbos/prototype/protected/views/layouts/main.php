<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ($detect->isMobile() ) {
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mobilebg.css" />


		

</head>

<body>

<div class="container" id="page">

	<div id="header">

		<div id="logo">
		<center><h1><?php echo CHtml::encode(Yii::app()->name); ?> </h1></center></div>
	</div><!-- header -->
	
	<div id="mainmenu">
		<ul id="menu">
	<h1 id = "tabs">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				
				array('label'=>'Customer', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/customer/index')),
				array('label'=>'Order', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/order/index')),
				array('label'=>'Order List', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/orderList/index')),
				array('label'=>'Payment Method', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/paymentMethod/index')),
				array('label'=>'Delivery', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/delivery/index')),
				array('label'=>'Item', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/item/index')),
				array('label'=>'Logs', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/logs/index')),
				
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				

			),
		)); ?></h1></ul>
		
		</div><!-- mainmenu -->
		
		
		
		
		
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by MI121 - Group 08.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

<?php }else{ ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="container" id="page">

	<div id="header">
		
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
	<?php if(Yii::app()->user->isGuest || Yii::app()->user->type==="Sytem Admin"){ ?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				
				array('label'=>'Customer', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/customer/index')),
				array('label'=>'Order', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/order/index')),
				array('label'=>'Order List', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/orderList/index')),
				array('label'=>'Payment Method', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/paymentMethod/index')),
				array('label'=>'Delivery', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/delivery/index')),
				array('label'=>'Item', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/item/index')),
				array('label'=>'Logs', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/logs/index')),
				
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		<?php }else{ ?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				
				array('label'=>'Customer', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/customer/view','id'=>Yii::app()->user->id)),
				array('label'=>'Order', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/order/index')),
				array('label'=>'Order List', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/orderList/index')),
				array('label'=>'Payment Method', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/paymentMethod/index')),
				array('label'=>'Delivery', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/delivery/index')),
				array('label'=>'Item', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/item/index')),
				array('label'=>'Logs', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/logs/index')),
				
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		<?php }?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by MI121 - Group 08.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
<?php } ?>


