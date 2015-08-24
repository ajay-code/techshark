<?php
	require_once('config.php');
	session_start();
	$obj1=new task;
	$obj1->checkUser();
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
				<?php
						if($_SESSION['logintype']=='super'){

					?>
				<ul class="breadcrumb">
					<li>
						<a href="addadmin.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Add New Administrator
							</span>
						</a>
					</li>
				</ul>
				<?php
					}

					?>
			</div>
			<?php
			if(isset($_GET['a']))
					{
						echo"<b style='color:green'>Updated Successfully</b>";
					}
					?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Administrators List</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Admin ID</th>
								  <th>Name</th>
								  <th>Last Login</th>
								  <th>Role</th>
								  <?php 
								  	if($_SESSION['logintype']=='super'){
								  ?>
								  <th>Actions</th>
								  <?php
								  	}
								  ?>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  		$id=$_SESSION['admin_id'];
								$obj=new task;
								$query = "select * from admins where type!='super' order by username";
								$data = $obj->query($query);
								$toggle = 0;
								while($obj->nextRecord())
								{ 
									$admin_id=$obj->Record['admin_id'];
						  ?>
							<tr>
								<td class="center"><?php echo $admin_id  ?></td>
								<td class="center"><?php echo $obj->Record['username'];  ?></td>
								<td class="center"><?php echo $obj->Record['user_last_login'];  ?></td>
								<td class="center">
									<?php
										$type = $obj->Record['type'];
											echo "<span class='label label-success'>$type</span>";
									?>
								</td>
								<?php
									if($_SESSION['logintype']=='super'){
										echo "<td class='center'>";
										echo "<a class='btn btn-success' href='viewadmin.php?admin_id=$admin_id'><i class='icon-zoom-in icon-white'></i>View</a>&nbsp;";
										echo "<a class='btn btn-info' href='editadmin.php?admin_id=$admin_id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
										echo "<a class='btn btn-danger' href='deladmin.php?admin_id=$admin_id'><i class='icon-trash icon-white'></i>Delete</a>";
										echo "</td>";
									}
								?>
							</tr>
							<?php
								}
							?>
						  </tbody>
					  </table>            
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
