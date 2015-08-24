<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Extro-Electronics Website Template | Computing :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />

<script type="text/javascript">
    $(function() {
        $('.grid-img a').lightBox();
    });
</script>

</head>

<body>
	<?php
	require_once("connect.php");
	$sb=$_GET['sb'];
	$query="select * from products where subcatid=$sb";
	$data=mysqli_query($con,$query);
	$snap=array();
	$name=array();
	$description=array();
	$pid=array();
			while($row=mysqli_fetch_assoc($data)){
			 $snap=$row['snap'];
			 $description=$row['description'];

			}


		 $num=mysqli_num_rows($data);
			 
			 
   
	?>
<div class="wrap"> 
		<?php include 'header.php'; ?>
<div class="content">
	<div class="section group">
		<div class="cont span_2_of_3">
			<div class="single">
				   <h2><a href="index.php">Home&nbsp;></a></h2>
				   <div class="clear"></div>	
			   <div class="text-h">
					<p class="left">Computing</p>
					<p class="right">There are <?php echo $num; ?> Products.</p>
					<div class="clear"></div>
			    </div>
			</div>
			<?php 
			$i=0;
              foreach ($snap() as $key => $value) {
             
	
		
			 	?>
			
			<div style="width:200px;height:150;border: black 2px;">
				<a href='#'><img style='width:100px; heigth:100px;' src='<?php echo $value;?>'></a><br>
				<p><?php echo $value;?></p><br>
					</div>
					<?php
				}
				?>
       
	</div>
</div>
</div>
  </div>	
<?php include 'footer.php'; ?>
</body>
</html>