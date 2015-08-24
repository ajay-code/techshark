<!DOCTYPE>
<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();
	$done = 0;
	if(isset($_POST["submit"]))
	{
		
		$product= new task;
		if($product->addproduct()){
		$done = 1;
		}
	}
?>
<?php require_once("headincludes.php"); ?>		

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
							<?php
								if($done==1)
								{
									echo "Product added successfully.";
								}
							?>
						</span>
						<form class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return conf();">
							<fieldset>
								<legend><h3 style="color:red;">Product Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="name">Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="name" id="name" type="text" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="price">Price</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="price" id="price" type="text" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Under Category</label>
								<div class="controls">
								  <select name="catid" id="select1" >
								  	<option value="">select</option>
								  	option
									<?php
										$query = "select * from categories order by name";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
											echo "<option value='$catid'>$name</option>";
										}
									?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Under Subcategory</label>
								<div class="controls">
								  <select name="subcatid" id="select2">
									<option value="">Select</option>
									
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Under Brand</label>
								<div class="controls">
								  <select name="brand" id="select3">
									<option value="">Select</option>
									<?php
										$query = "select * from brands order by name";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
											echo "<option value='$bid'>$name</option>";
										}
									?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="address">Description</label>
								<div class="controls">
								  <textarea class="input-xlarge focused" name="des" rows="10" id="des"></textarea>
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="fileInput">Product Snap</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="snap" id="fileInput" type="file" >
							  </div>
							</div>   
							   <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Add Product</button>
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
