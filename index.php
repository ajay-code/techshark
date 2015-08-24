<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Extro-Electronics Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- FlexSlider -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>

</head>
<body >
<div class="wrap"> 
	<?php include 'header.php';?>
<div class="slider">
        		<img id="1" src="images/slider1.jpg" alt=""/>
    	    	<img id="2" src="images/slider2.jpg" alt=""/>
    	    	<img id="3" src="images/slider3.jpg" alt=""/>
	
</div>
<div class="content">
<div class="section group">
	
</div>
<div class="text-h">
	<h2 >Featured products</h2>
</div>

<div class="section group" >
	<?php 
include 'connect.php';
$q="select * from products where type='featured'";
$d=mysqli_query($con,$q);
while($row=mysqli_fetch_assoc($d))
{
	extract($row);
	?>

					<div class="col_1_of_5 span_1_of_5" style="float:left;margin-left: 0px; margin-right: 1%;">
						<div class="grid-img">
							<a href='#'><img style="height:100px; " src='admin/<?php echo $snap;?>'></a>
						</div><br>
						<p><?php echo $pname;?></p>
						<button class="left"><?php echo "₹$price";?></button>
						<div class="btn right"> <?php echo"<a href='details.php?p=$pid'>view</a></div>";?>
					</div>
	<?php 
		} 
	?>

</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>