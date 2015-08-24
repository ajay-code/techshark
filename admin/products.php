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
						if($_SESSION['insertright']=='y'){

					?>
				<ul class="breadcrumb">
					<li>
						<a href="addproduct.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Add New Product
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
						<h2><i class="icon-user"></i>Products List</h2>
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
							      <th>Product ID</th>
							      <th>Product name</th>
								  <th>Category</th>
								  <th>subcategory</th>
								  <th>Brand</th>
								  <th>Price</th>
								  <th>Added on</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
								$obj=new task;
								$query = "SELECT p.pid,p.subcatid,p.pname,p.price,p.time,p.bid,p.status,b.bid,b.name as bname,s.subcatid,s.catid,s.name as sname,c.catid,c.name as cname FROM products p,subcategories s,brands b,categories c WHERE p.subcatid=s.subcatid and p.bid=b.bid and s.catid=c.catid and p.status='1' order by pname";

								$data = $obj->query($query);
								$toggle = 0;
								while($obj->nextRecord())
								{ 
									$pid=$obj->Record['pid'];
						  ?>
							<tr>
								<td class="center"><?php echo $pid  ?></td>
								<td class="center"><?php echo $obj->Record['pname'];  ?></td>
								<td class="center"><?php echo $obj->Record['cname'];  ?></td>
								<td class="center"><?php echo $obj->Record['sname'];  ?></td>
								<td class="center"><?php echo $obj->Record['bname'];  ?></td>
								<td class="center"><?php echo $obj->Record['price'];  ?></td>
								<td class="center"><?php echo $obj->Record['time'];  ?></td>




						
								<?php
									echo "<td class='center'>";
									if($_SESSION['viewright']=='y'){
										echo "<a class='btn btn-success' href='viewproduct.php?pid=$pid'><i class='icon-zoom-in icon-white'></i>View</a>&nbsp;";
										}
									if($_SESSION['editright']=='y'){
										echo "<a class='btn btn-info' href='editproduct.php?pid=$pid'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
										}
									if($_SESSION['deleteright']=='y'){
										echo "<a class='btn btn-danger' href='delproduct.php?pid=$pid'><i class='icon-trash icon-white'></i>Delete</a>";
										}
									echo "</td>";
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
