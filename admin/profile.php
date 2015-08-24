<?php
	require_once('config.php');
	session_start();
	$obj=new task;
	$obj->checkUser();

	
	$admin_id = $_SESSION["admin_id"];
	$query ="select * from admins where admin_id='$admin_id'";
	$obj->query($query);
	$obj->nextRecord();
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
						<a href="admins.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Administrator List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Administrator Record</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<div style="margin-left:00px;">
								<img style="height:200px; width:150px; " src="<?php echo $obj->Record['snap'];?>"> 
								</div>
						  <ul class="dashboard-list">
								<li>
									<strong>Admin ID</strong><br/>
										<?php echo $obj->Record['admin_id'];  ?><br>
								</li>
								<li>
									<strong> USER NAME</strong><br/>
										<?php echo $obj->Record['username']; ?><br>
								</li>
								<li>
									<strong> NAME</strong><br/>
										<?php echo $obj->Record['name']; ?><br>
								</li>
								
								<li>
									<strong>Last Login</strong><br/>
										<?php echo $obj->Record['user_last_login'];  ?><br>
								</li>
								<li>
									<strong>Role</strong><br/>
									<?php
										$type = $obj->Record['type'];
										if($type=="admin")
											echo "<span class='label label-success'>$type</span>";
										else
											echo "<span class='label label-warning'>$type</span>";
									?><br>
								</li>
								<li>
										<strong>ADDRESS</strong><br/>
										<?php echo $obj->Record["address"];?><br>
										
								</li>
								<li>
										<strong>CONTECT NUMBER</strong><br>
										PHONE NO:<?php echo $obj->Record['phone'];?><br>
								</li>
								<li>
									<strong>EMAIL ID</strong>
										<?php echo $obj->Record['email']; ?><br>
								</li>
								
								<li>
										<strong>ACTION</strong><br/>
										<?php echo "<a class='btn btn-info' href='editadmin.php?admin_id=$admin_id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
											  echo "<a class='btn btn-info' href='changepsw.php?admin_id=$admin_id'><i class='icon-edit icon-white'></i>Change password</a>&nbsp;"; 	
										 ?><br>
								</li>
								</ul>
						    </div>
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
