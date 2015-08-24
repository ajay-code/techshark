<?php
	session_start();
	$id = $_GET['admin_id'];
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();
	
	$query = "select password from admins where admin_id=$id";
	$data = $obj1->query($query);
	$row = mysqli_fetch_assoc($data);
	$done = 0;

	if(isset($_POST["submit"]))
	{
		$newPassword = $_POST['newpsw'];  
		$client = new task;
		if($client->changeAdminPsw($newPassword))
			$done = 1;
		else 
			echo "error";
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
						<a href="profile.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Profile
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> New Brand Head Form</h2>
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
									echo "Password changed successfully";
								}
							?>
						</span>
						<form class="form-horizontal" name="newclient" method="post" onsubmit="return changePsw()">
							<fieldset>
								<legend><h3 style="color:red;">Details</h3></legend>
								<input name="password" class="input-xlarge focused" style="heigth:20px" id="password" type="hidden" value="<?php echo $row['password']; ?>">
							  <div class="control-group">
									<label class="control-label" for="oldpsw">Old Password</label>
									<div class="controls">
									  <input name="oldpsw" class="input-xlarge focused" style="heigth:20px" id="oldpsw" type="text" value="">
									</div>
							  </div>
							
							  <div class="control-group">
								<label class="control-label" for="newpsw">New Password</label>
								<div class="controls">
								  <input name="newpsw" class="input-xlarge focused" style="heigth:20px" id="newpsw" type="text" value="">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="confirmpsw">Confirm Password</label>
								<div class="controls">
								  <input name="confirmpsw" class="input-xlarge focused" style="heigth:20px" id="confirmpsw" type="text" value="">
								</div>
							  </div>
							  	

							  <div class="form-actions">
								<button name="submit" type="submit" class="btn btn-primary">Change</button>
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
