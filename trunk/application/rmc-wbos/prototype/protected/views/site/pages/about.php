<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);

?>

<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ($detect->isMobile() ){
echo '<h1 style = color:red;>About Rodzon Marketing Corporation</h1>';

echo ' <h3 style = ;color:red;>I. Company Profile</h3>';

echo '<p style =  align:justify;color:red;>Rodzon Marketing Corporation is a private company that was founded in 1977. It specializes in wholesale and/or general merchandise field in the market. Located at Barangay 65, Lakandula st, Pasay City, Philippines, the company is known for their flagship product, Ludy’s peanut butter.</p>'; 

echo '<p style =  align:justify;color:red;>Now, with almost 37 years of experience in the industry, RMC has acquired and introduced more and more products to its customers. Currently, their line of products include, Ludy’s peanut butter, Sourcere’s Fluffy and Melo marshmallow products, and other varieties of processed - food products.</p>';

echo '<h3 style = color:red;>II. Focus Departments</h3>';

echo '<p style =  align:justify;color:red;><b><i>Finished – Goods Inventory (Storage)</i></b></p>';
 
echo '<p style =  align:justify;color:red;>This is the department that handles and stores the finished products (produced by the production department). Not only that, this is also the department that is responsible in storing all other kinds or varieties of processed - food that the company distributes and/or sells to its customers and other warehouses nationwide. The most important function of this department is to track the flow of finished goods coming in and out of its warehouses (storage facilities).</p>';

echo '<p style =  align:justify;color:red;><b><i>Sales Department</i></b></p>

<p style =  align:justify;color:red;>This is the department that records all the sales order made by customers. Not only that, it is also the department that checks and updates a customer’s records.</p>

<p style =  align:justify;color:red;><b><i>Logistics Department</i></b></p>

<p style =  align:justify;color:red;>This department is responsible for collecting and delivering the ordered goods to the customer.</p>

<p style =  align:justify;color:red;><b><i>Accounting Department</i></b></p>

<p style =  align:justify;color:red;>This department is responsible for collecting payments made by the customer to the company.</p>

<h3 style = color:red;><font style =color:red;>III. Business Requirements</h3>

<p style =  align:justify;color:red;>Rodzon Marketing Corporation lacks I.T. solutions in their company. To keep up with the rapid development of technology, the company wants a web – based ordering system to be used mainly by their customers (retailers). By creating an improved and automated ordering system, their company will be more efficient in terms of work done and its customers would spend less time on ordering their products.</p> 

<p style =  align:justify;color:red;>The main business opportunity in this project is to create an automated ordering system because customers waste too much time going to the office just to order products that would supply their businesses’ needs. This old process is continuously being done at present because the company, as said earlier, lacks I.T. solutions.</p>

<p style =  align:justify;color:red;>By having their own web - based ordering system, it will be more efficient and/or faster to order products from them. The time wasted by their customers in ordering their products would be (greatly) minimized once the system is completed and implemented. Lastly, the system can also help in monitoring the finished goods inventory from their warehouse (Pasay Warehouse).</p>
';
}else{

echo '<h1>About Rodzon Marketing Corporation</h1>

<h3>I. Company Profile</h3>

<p align=justify>Rodzon Marketing Corporation is a private company that was founded in 1977. It specializes in wholesale and/or general merchandise field in the market. Located at Barangay 65, Lakandula st, Pasay City, Philippines, the company is known for their flagship product, Ludy’s peanut butter.</p> 

<p align=justify>Now, with almost 37 years of experience in the industry, RMC has acquired and introduced more and more products to its customers. Currently, their line of products include, Ludy’s peanut butter, Sourcere’s Fluffy and Melo marshmallow products, and other varieties of processed - food products.</p>

<h3>II. Focus Departments</h3>

<p><b><i>Finished – Goods Inventory (Storage)</i></b></p>
 
<p align=justify>This is the department that handles and stores the finished products (produced by the production department). Not only that, this is also the department that is responsible in storing all other kinds or varieties of processed - food that the company distributes and/or sells to its customers and other warehouses nationwide. The most important function of this department is to track the flow of finished goods coming in and out of its warehouses (storage facilities).</p>

<p><b><i>Sales Department</i></b></p>

<p align=justify>This is the department that records all the sales order made by customers. Not only that, it is also the department that checks and updates a customer’s records.</p>

<p><b><i>Logistics Department</i></b></p>

<p align=justify>This department is responsible for collecting and delivering the ordered goods to the customer.</p>

<p><b><i>Accounting Department</i></b></p>

<p align=justify>This department is responsible for collecting payments made by the customer to the company.</p>

<h3>III. Business Requirements</h3>

<p align=justify>Rodzon Marketing Corporation lacks I.T. solutions in their company. To keep up with the rapid development of technology, the company wants a web – based ordering system to be used mainly by their customers (retailers). By creating an improved and automated ordering system, their company will be more efficient in terms of work done and its customers would spend less time on ordering their products.</p> 

<p align=justify>The main business opportunity in this project is to create an automated ordering system because customers waste too much time going to the office just to order products that would supply their businesses’ needs. This old process is continuously being done at present because the company, as said earlier, lacks I.T. solutions.</p>

<p align=justify>By having their own web - based ordering system, it will be more efficient and/or faster to order products from them. The time wasted by their customers in ordering their products would be (greatly) minimized once the system is completed and implemented. Lastly, the system can also help in monitoring the finished goods inventory from their warehouse (Pasay Warehouse).</p>';


}
?>



<!--
<p>Hi! Welcome to my blog! This blog aims to serve as an extenstion of my thoughts in order to share whatever do I have in mind. I hope you guys will enjoy this post!
file could be updated through this link: <code><?php echo __FILE__; ?></code>.</p>
-->