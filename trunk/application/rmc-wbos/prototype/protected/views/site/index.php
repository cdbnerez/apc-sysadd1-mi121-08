<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
	
	if ($detect->isMobile() ) {
	echo '<h3 style = font-size:50px;color:white;><i>';
	echo CHtml::encode(Yii::app()->name);
	echo '</i></h3>';
	echo '<br>';
	}else{
	echo '<h1><i>';
	echo CHtml::encode(Yii::app()->name);
	echo '</i></h1>';
	echo '<br>';
	}
?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
	
	if ($detect->isMobile() ) {
	echo '<h1 style = font-size:50px;color:white;> Welcome to the Rodzon Marketing Corporation - Web Based Ordering System (RMC-WBOS)!</font></p></h1>';
	}else{
	echo '<h3><p align = center> Welcome to the Rodzon Marketing Corporation - Web Based Ordering System (RMC-WBOS)!</p></h3>';
	}
	?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ($detect->isMobile()){
echo '<p style =  align:justify;font-size:35px;color:white;> There are two versions of this web application. The first version is the localhost version and the other one is
a hosted version. To access the hosted version, <a href="http://apc.csf.ph/rmc-wbos/">click here</a>.</p>
<p style =  align:justify;font-size:35px;color:white;> To view the documentation of this project, 
<a href="http://projects2.apc.edu.ph/wiki/index.php/SYSADD1_MI121_Group_8:_Carlos_Daniel_Nerez_-_BSIT-MI"> click here </a>.</p>';
}else{
echo '<p align = justify> There are two versions of this web application. The first version is the localhost version and the other one is
a hosted version. To access the hosted version, <a href="http://apc.csf.ph/rmc-wbos/">click here</a>.</p>
<p align = justify> To view the documentation of this project, 
<a href="http://projects2.apc.edu.ph/wiki/index.php/SYSADD1_MI121_Group_8:_Carlos_Daniel_Nerez_-_BSIT-MI"> click here </a>.</p>';
}



?>


<!--
<p>Congratulations! You have successfully created your Yii application.</p>

<p>This site aims to:</p>
<ul>
	<li>Promote the use of Yii as a primary tool for generating web applications: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
-->