<?php    
	
	include("connect.php");
	$con->set_charset("utf8");
	$query="select * from formateur where conferme = 1";
	$res=mysqli_query($con,$query);
	$a = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$num1query = "select * from visiteur where formation = ".$row['id'];
		$num1res = mysqli_query($con,$num1query);
		$row['full'] = mysqli_num_rows($num1res);
		$a[] = $row;
	}
	echo json_encode($a);
