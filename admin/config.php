<?php
class task{
	var $Host     = "localhost"; // Hostname of our MySQL server. 
   	var $Database = "techshark"; // Logical database name on that server. 
   	var $User     = "root"; // User and Password for login. 
   	var $Password = "";
    var $con=0;  // Result of mysql_connect(). 
    var $Query_ID = 0;  // Result of most recent mysql_query().
    var $Row;// current row number. 
    var $Record;

	 function AddCategory()
	{
		$this->connect();
		$id = $this->getId("categories","catid");
		$name = addslashes(strtoupper($_POST["name"]));

		$query = "insert into categories(catid,name,status) values('$id','$name','1')";
		//echo $query;
		mysqli_query($this->con,$query);
	}

	function AddBrand()
	{
		$this->connect();
		$id = $this->getId("brands","bid");
		$name = addslashes(strtoupper($_POST["name"]));

		$query = "insert into brands(bid,name,status) values('$id','$name','1')";
		//echo $query;
		mysqli_query($this->con,$query);
	}

	function AddSubCategory()
	{
		$this->connect();
		$id = $this->getId("subcategories","subcatid");
		$name = addslashes(strtoupper($_POST["name"]));
		$catid = $_POST["catid"];

		$query = "insert into subcategories(subcatid,name,catid,status) values('$id','$name','$catid','1')";
		//echo $query;
		mysqli_query($this->con,$query);
	}



	 function connect() 
    { 
        $this->con=mysqli_connect("$this->Host","$this->User","$this->Password","$this->Database");
	}


function EditSubCategory()
	{
		$this->connect();
		$id = $_POST['subcatid'];
		$name = addslashes(strtoupper($_POST["name"]));
		$catid = $_POST['catid'];
		$query = "update subcategories set name='$name', catid='$catid' where subcatid='$id'";
		//echo $query;
		mysqli_query($this->con,$query);
	}

	function EditCategory()
	{
		$this->connect();
		$id = $_POST['catid'];
		$name = addslashes(strtoupper($_POST["name"]));

		$query = "update categories set name='$name' where catid='$id'";
		//echo $query;
		
		if (mysqli_query($this->con,$query)){
			return 1;
		}
	}

	function Editbrand()
	{
		$this->connect();
		$id = $_POST['bid'];
		$name = addslashes(strtoupper($_POST["name"]));

		$query = "update brands set name='$name' where bid='$id'";
		//echo $query;
		
		if (mysqli_query($this->con,$query)){
			return 1;
		}
	}





	function updateadmin()
	{   $admin_id=$_SESSION['admin_id'];

	    $this->connect();
	    $query="select snap from admins where admin_id=$admin_id";
	    $data=mysqli_query($this->con,$query);
	    $row=mysqli_fetch_assoc($data);
		$username = strtolower(addslashes($_POST["username"]));
		$password = strtolower(addslashes($_POST["password"]));
		$name = strtolower(addslashes($_POST["name"]));
		$phone = strtolower(addslashes($_POST["phone"]));
		$address = strtolower(addslashes($_POST["address"]));
		$emailid = strtolower(addslashes($_POST["emailid"]));
		$ir = "n";
		if(isset($_POST["insert"]))
			$ir = "y";
		$er = "n";
		if(isset($_POST["edit"]))
			$er = "y";
		$dr = "n";
		if(isset($_POST["delete"]))
			$dr = "y";
		$vr = "n";
		if(isset($_POST["view"]))
			$vr = "y";

		$snap=$row['snap'];

       if($_FILES["snap"]["error"]==0)
		{
			$type=$_FILES["snap"]["type"];
			$temp=explode("/",$type);
			$ext=$temp[1];
			if($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png" )
			{
				$snap="admins/$admin_id.$ext";
				move_uploaded_file($_FILES["snap"]["tmp_name"],$snap);	
			}
		}
		
        $query="UPDATE `admins` SET `username`='$username',`name`='$name',`password`='$password',`address`='$address',`email`='$emailid',`phone`='$phone',`snap`='$snap',`insertright`='$ir',`editright`='$er',`deleteright`='$dr',`viewright`='$vr' WHERE admin_id='$admin_id'";
		if(mysqli_query($this->con,$query)){
	return 1;
		}
	}

	 //------------------------------------------- 
//    Change Admin password
//------------------------------------------- 
    function changeAdminPsw( $password ) 
        { 
        $this->connect(); 
        $id = $_SESSION['admin_id'];
        $query = "update admins set `password`='$password' where admin_id=$id";
        if(mysqli_query($this->con,$query))
        {
        return 1; 

        }
        else{
        	return 0;
        }
        
        } // end function changeAdminPsw 


	function updateproduct()
	{

		$this->connect();
		$name = strtolower(addslashes($_POST["name"]));
		$price = $_POST["price"];
		$subcatid = $_POST["subcatid"];
		$bid = $_POST["brand"];
		$description = strtolower(addslashes($_POST["des"]));
		$snap="products/default.jpg";
		$pid=$_POST['pid'];

        $snap=$_SESSION['productsnap'];

       if($_FILES["snap"]["error"]==0)
		{
			$type=$_FILES["snap"]["type"];
			$temp=explode("/",$type);
			$ext=$temp[1];
			if($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png" )
			{
				$snap="admins/$admin_id.$ext";
				move_uploaded_file($_FILES["snap"]["tmp_name"],$snap);	
			}
		}
		$query="UPDATE `products` SET `price`='$price',`bid`='$bid',`subcatid`='$subcatid',`pname`='$name',`description`='$description',`snap`='$snap',`status`='1' WHERE pid='$pid'";
		if(mysqli_query($this->con,$query)){
			return 1;
	}
}

	
	function addproduct()
	{
		$this->connect();
		$name = strtolower(addslashes($_POST["name"]));
		$price = strtolower(addslashes($_POST["price"]));
		$subcatid = strtolower(addslashes($_POST["subcatid"]));
		$bid = strtolower(addslashes($_POST["brand"]));
		$description = strtolower(addslashes($_POST["des"]));
		$snap="products/default.jpg";
		$pid=$this->getId("products","pid");

		if($_FILES["snap"]["error"]==0)
		{
			$type=$_FILES["snap"]["type"];
			$temp=explode("/",$type);
			$ext=$temp[1];
			if($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png" )
			{
				$snap="products/$pid.$ext";
				move_uploaded_file($_FILES["snap"]["tmp_name"],$snap);	
			}
		}
		$query="INSERT INTO `techshark`.`products` (`pid`, `price`,`bid`, `subcatid`, `pname`, `description`, `snap`,`time` ,`status`) VALUES ('$pid', '$price','$bid' ,'$subcatid', '$name', '$description', '$snap',NOW(),'1')";
		if(mysqli_query($this->con,$query)){
			return 1;
	}
	}
	

	function AddAdmin(){
		$this->connect();
		$query = "select max(admin_id) as maxid from admins";
		$data = mysqli_query($this->con,$query);
		$admin_id = 1;
		if($row = mysqli_fetch_assoc($data))
			{
			extract($row);
			$admin_id = $maxid + 1;
			}
		$username = strtolower(addslashes($_POST["username"]));
		$password = strtolower(addslashes($_POST["password"]));
		$name = strtolower(addslashes($_POST["name"]));
		$phone = strtolower(addslashes($_POST["phone"]));
		$address = strtolower(addslashes($_POST["address"]));
		$emailid = strtolower(addslashes($_POST["emailid"]));
		$ir = "n";
		if(isset($_POST["insert"]))
			$ir = "y";
		$er = "n";
		if(isset($_POST["edit"]))
			$er = "y";
		$dr = "n";
		if(isset($_POST["delete"]))
			$dr = "y";
		$vr = "n";
		if(isset($_POST["view"]))
			$vr = "y";

		$snap="admins/default.jpg";

		if($_FILES["snap"]["error"]==0)
		{
			$type=$_FILES["snap"]["type"];
			$temp=explode("/",$type);
			$ext=$temp[1];
			if($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png" )
			{
				$snap="admins/$admin_id.$ext";
				move_uploaded_file($_FILES["snap"]["tmp_name"],$snap);	
			}
		}
		
		$query = "insert into admins values('$admin_id','$username','$password','$name','$address','$phone','$emailid','$snap',NOW(),'$ir','$dr','$er','$vr','normal','')";
		if(mysqli_query($this->con,$query)){
			return 1;
		}
	}




 //------------------------------------------- 
//    Queries the database 
//------------------------------------------- 
    function query( $Query_String ) 
        { 
        $this->connect(); 
        if($this->Query_ID = mysqli_query( $this->con,$Query_String))
        {
        return $this->Query_ID; 

        }
        else{
        	return 0;
        }
        
        } // end function query 

       
        function checkUser()
      {
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['admin_id'])) 
	     {
		header('Location:index.php');
		exit;
	      }		
	  }

function doLogin()
{
      $this->connect();
	  // if we found an error save the error message in this variable
	
	$userName = $_POST['username'];
	$password = $_POST['password'];
	
	// first, make sure the username & password are not empty
		// check the database and see if the username and password combo do match
		$sql = "SELECT * FROM admins WHERE username = '$userName' AND password = '$password' ";
		$result = $this->query($sql);
		$result2=mysqli_num_rows($result);	  
		if($result2) 
		{
			//$row = user_id($result);
			
			$row = mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['admin_id'] = $row['admin_id'];
			$_SESSION['username'] = $userName;
			$_SESSION['insertright'] = $row['insertright'];
			$_SESSION['deleteright'] = $row['deleteright'];
			$_SESSION['editright'] = $row['editright'];
			$_SESSION['viewright'] = $row['viewright'];
			$_SESSION['logintype'] = $row['type'];
			$_SESSION['psw'] = $row['password'];

			// log the time when the user last login
			$sql = "UPDATE admins  SET user_last_login = NOW()	WHERE admin_id = '{$row['admin_id']}'";
			$this->query($sql);	
			$url = "home.php";
			
				header("location:home.php");
			}
	
	   else
	   {
		  header('location:index.php?p=1');
	   }
	
	return $errorMessage;
} 

//------------------------------------------- 
//    Retrieves the 2 record in a recordset 
//------------------------------------------- 
    function nextRecord() 
        { 
        $this->Record = mysqli_fetch_assoc( $this->Query_ID ); 
        $this->Row += 1; 
        $stat = is_array( $this->Record ); 
        if(!$stat ) 
            { 
            mysqli_free_result($this->Query_ID ); 
            $this->Query_ID = 0; 
            } 
        return $stat; 
        } // end function nextRecord 



    function getId($table, $field)
	{
		$id = 1;
		$this->connect();
		$query = "select $field from $table where $field=(select max($field) from $table)";
		$data = $this->query($query);
		if($row = mysqli_fetch_assoc($data))
		{
			extract($row);
			$id = $row[$field] + 1;
		}
		return $id;
	}


}
?>