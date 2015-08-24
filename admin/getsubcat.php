<?php
	$catid=$_GET['catid'];
	$query="select * from subcategories where catid=$catid";
	$con = mysqli_connect("localhost","root","","techshark");
	$data = mysqli_query($con,$query);
 	while($row = mysqli_fetch_assoc($data)){
 			?>
 			<option value="<?php echo $row['subcatid']?>" ><?php echo $row['name']?></option>
 		
<?php
 		}
 		echo $catid;
?>