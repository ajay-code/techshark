<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
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
				<?php
						if($_SESSION['insertright']=='y'){

					?>
				<ul class="breadcrumb">
					<li>
						<a href="addsubcategory.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Add New Sub Category
							</span>
						</a>
					</li>
				</ul>
				<?php
						}
					?>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Sub Categories Head</h2>
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
								  <th>ID</th>
								  <th>Name</th>
								  <th>Category</th>
								  <th class="center">Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
								$list = new task;
								$query = "select s.subcatid, s.name, c.name as catname from categories c, subcategories s where c.catid=s.catid and s.status='1' order by s.name";
								$list->query($query);
								
								while($list->nextRecord())
								{
									$id = $list->Record['subcatid'];
									$name = $list->Record['name'];
									$catname = $list->Record['catname'];
									echo "<tr>";
									echo "<td>$id</td>";
									echo "<td class='center'>$name</td>";
									echo "<td class='center'>$catname</td>";
									echo "<td class='center'>";
									if($_SESSION['editright']=='y'){
										echo "<a class='btn btn-info' href='editsubcategory.php?id=$id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
										}
									if($_SESSION['deleteright']=='y'){	
										echo "<a onclick='return confirm(\"Are you sure to delete this record?\");' class='btn btn-danger' href='delsubcategory.php?id=$id'><i class='icon-trash icon-white'></i>Delete</a>";
										}
									echo "</td>";
									echo "</tr>";
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