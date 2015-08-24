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
	
<div class="wrap"> 
		<?php   include 'header.php'; 
				$sb=$_GET['sb'];
				$query1="select * from products where subcatid=$sb and status='1' ";
				$data1=mysqli_query($con,$query1);
				$num=mysqli_num_rows($data1);
		?>
<div class="content">
	<div class="section group">
		<div class="cont container" style=" width: 100%;">
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

				
				while($row1=mysqli_fetch_assoc($data1)){
					extract($row1);
             
	
		
			 	?>
			
						<div class="col_1_of_5 span_1_of_5" style="float:left;">
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
</div>
  </div>	
<?php include 'footer.php'; ?>
</body>
</html>