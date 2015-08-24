<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();
	$obj=new task;	
	$pid=$_GET['pid'];
	$query = "SELECT p.*,b.bid,b.name as bname,s.subcatid as sid,s.catid,s.name as sname,c.catid as cid,c.name as cname FROM products p,subcategories s,brands b,categories c WHERE p.subcatid=s.subcatid and p.bid=b.bid and s.catid=c.catid and p.status='1' and p.pid='$pid'";
    $data= $obj->query($query);
    $row=mysqli_fetch_array($data);
    extract($row);
	$done = 0;
	if(isset($_POST["submit"]))
	{
	    $product = new task;
		if($product->updateproduct()){
		header("location:products.php?a=1");
		}
	}
	require_once("headincludes.php"); ?>	

<body>
		<!-- topbar starts -->
		<?php require_once("topbar.php"); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<?php require_once("sidemenu.php"); ?>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="products.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Products List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Product Form</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<span style="color:green;font-size:16px;">
						</span>
						<form class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return conf();">
							<fieldset>
								<legend><h3 style="color:red;">Product Details</h3></legend>
							  <div class="control-group">
					            <input name="pid" id="name" type="hidden" value="<?php echo $pid?>"/>

								<label class="control-label" for="name">Name</label>
								<div class="controls">

								  <input class="input-xlarge focused" style="height:28;" name="name" id="name" type="text" value="<?php echo$pname?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="price">Price</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="price" id="price" type="text" value="<?php echo$price?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Under Category</label>
								<div class="controls">
								  <select name="catid" id="select1" >
									<?php
										$query = "select * from categories order by name";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row1 = mysqli_fetch_assoc($data))
										{
											?>
										<option value='<?php echo $row1['catid']?>' <?php if ($cid==$row1['catid']) { echo "selected"; } ?>><?php echo $row1['name']; ?></option>";
										

										<?php
											}
										?>

									
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Under Subcategory</label>
								<div class="controls">
								  <select name="subcatid" id="select2" >
									<?php
										$query = "select * from subcategories order by name";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row2 = mysqli_fetch_assoc($data))
										{
											?>
										<option value='<?php echo $row2['subcatid']?>' <?php if ($sid==$row2['subcatid']) { echo "selected"; } ?>><?php echo $row2['name']; ?></option>";
										

										<?php
											}
										?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Under Brand</label>
								<div class="controls">
								  <select name="brand" id="select3">
									<?php
										$query = "select * from brands order by name";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row3 = mysqli_fetch_assoc($data))
										{
											?>
										<option value='<?php echo $row3['bid']?>' <?php if ($bid==$row3['bid']) { echo "selected"; } ?>><?php echo $row3['name']; ?></option>";
										

										<?php
											}
										?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="address">Description</label>
								<div class="controls">
								  <textarea class="input-xlarge focused" name="des" rows="10" id="des"><?php echo$description?></textarea>
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="fileInput">Product Snap</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="snap" value="<?php echo$snap ?>" id="fileInput" type="file" >
								<?php $_SESSION['productsnap']=$snap?>
							  </div>
							</div>   
							   <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Update Product</button>
								<button class="btn">Cancel</button>
							  </div>
								
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<?php require_once("footer.php"); ?>
	</div><!--/.fluid-container-->

	<?php require_once("includes.php"); ?>
	
		
</body>
</html>
