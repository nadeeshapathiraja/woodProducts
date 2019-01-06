
<?php
$hostname= "localhost";
	$username="pdnc";
	$password="123";
	
	$con = mysqli_connect($hostname,$username,$password);
	
	$dbconect=mysqli_select_db($con,"products");
	
	$sql="SELECT * FROM tblproducts";

	$result= mysqli_query($con,$sql);
	
	echo "<table>";
	$count=0;
		
	while($row=mysqli_fetch_array($result)){
		
		$count=$count+1;
		if($count%2!=0){
			echo "<tr>";
		}
		
		echo "<td>
			
				PID:$row[0]<br/>
				Name:$row[1]<br/>
				<img src=images/$row[2] width=100px height=100px/><br/>
				Description:$row[3]<br/>
				Price:$row[4]<br/><br/>
			
		</td>";
				
		if($count%2==0) {
			echo "</tr>";
		}
	}
		echo "</table>";
		
		
		
	
	
		
	
