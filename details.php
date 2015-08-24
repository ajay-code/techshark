
-<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Extro-Electronics Website Template | Details :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />

<script type="text/javascript">
    $(function() {
        $('.grid-img1 a').lightBox();
    });
</script>

</head>

<body>
	
<div class="wrap"> 
	<?php
	include 'header.php';
	$pid=$_GET['p'];
	$q="select * from products where pid='$pid'";
	$d=mysqli_query($con,$q);
	$r=mysqli_fetch_assoc($d);
	extract($r);
?>

<div class="content">
	<div class="section group">
		<div class="cont" style="width: 100%;">
			<div class="single">
		      <h2><a href="index.php">Home</a></h2>
				<div class="grid-img " style="border:grey solid 1px;">
					<a href="<#"><img style="width:400px;height:450px" src="admin/<?php echo $snap ?>"></a> <br>
				</div>
				<div class="para">
					<h4><?php echo ucfirst($pname);?></h4>
				<div class="cart-b">
					<button class="left rs">₹<?php echo $price; ?></button>
				    <div class="clear"></div>
				 </div>
				 <h5>100 items in stock</h5>
			   <div style="width:50%;"><?php echo ucfirst($description);?></div>
			   	
			   <div class="clear"></div>	
		   </div>
	    <div class="div2">
        <div id="mcts1">
        	
        </div>
   		</div>
	
</div>
<?php include 'footer.php'; ?>

</body>
</html>