<?php
$hostname= "localhost";
	$username="pdnc";
	$password="123";
	
	$con = mysqli_connect($hostname,$username,$password);
	
	$dbconect=mysqli_select_db($con,"products");
	
	$sql="SELECT * FROM tblproducts";

	$result= mysqli_query($con,$sql);
	echo "
	<table border=1>
		<tr>
			<th>PID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
		</tr>
	";
	
		
		while($row=mysqli_fetch_array($result)){
		echo "
		<tr>
			
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>
			
		</tr>
		";
	}
		
	echo "</table>";
?>


<html>
<head>
<title>addproducts</title>
</head>

<body>

<h1>Add Products</h1>
<form method="post" name="form" action="#" enctype="multipart/form-data">
<table>
  <tr>
    <td>PID</td>
    <td><input name="txtpid" type="text" /></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input name="txtName" type="text" /></td>
  </tr>
  <tr>
    <td>Image</td>
    <td><input name="imgfile" type="file" placeholder="Browse"></td>
  </tr>
  <tr>
    <td>Desc</td>
    <td><textarea name="txtdesc"></textarea></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input name="txtprice" type="text" /></td>
  </tr>
  <tr>
    
    <td><input name="save" type="submit" /><input name="reset" type="Reset" /></td>
  </tr>
</table>

<a href="products.php">View Page</a><br/><br/>

</body>
</html>
<?php

	if(isset($_POST['txtpid'])){
		
	$pid=$_POST['txtpid'];
	$name=$_POST['txtName'];
	$image=$_FILES['imgfile']["name"];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	

	$hostname= "localhost";
	$username="pdnc";
	$password="123";
	
	$con = mysqli_connect($hostname,$username,$password);
	
	$database=mysqli_select_db($con,"products");

	$sql="INSERT INTO tblproducts(pid,name,image,description,price) VALUES('$pid','$name','$image','$desc',$price)";
	
	$result=mysqli_query($con,$sql);
	echo "Number of records Inserted: $result<br/>";
	
	mysqli_close($con);
	if($result==1){
		//uplord file to server
	//make file uplord path
		$path="images/".$_FILES["imgfile"]["name"];
	//uplord
		move_uploaded_file($_FILES["imgfile"]["tmp_name"],$path);
	
	}
	
	}

?>
