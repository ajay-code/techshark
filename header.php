<?php 
	require_once("connect.php");
    $query="select * from categories where status='1'";
    $data=$con->query($query);
?>
<div class="header">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""  title="logo"/></a>
		</div>
		
		<div class="clear"></div>
	</div>
<div class="menu-bg" style="width:100.7%">
	<ul id="menu">
		<li><a href="index.php">Home</a></li>

		<li><a href="#">Categories</a>
			<ul class="sub1">
				<?php
				
				while($row=mysqli_fetch_array($data))
				{
                extract($row);
               

                ?>
				<li class="l1"><a href='#'><?php echo $name; ?></a>
					<ul class="sub2">
							<?php
								require_once("connect.php");
				                $query1="select * from subcategories where catid=$catid and status='1'";
				                $data1=$con->query($query1);
								while($row1=mysqli_fetch_array($data1))
								{
									extract($row1);
				               ?>
				               <?php echo"<li><a href='compute.php?sb=$subcatid'>"; echo $row1['name'] ;?></a></li>
				               <?php
								}
								?>
					</ul>
				</li>
				
			<?php
				
				}
			?>
			</ul>
		</li>
		<li><a href="about.php">About</a></li>

	</ul> 
	
	<div class="clear"></div>
</div>