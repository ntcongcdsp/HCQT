<?php
	include_once("../PHP/ConnectDB.php");
	if($_POST['id'])
	{
		$conn = ConnectDB::connect();
		$id=$_POST['id'];
		
		$sql = "SELECT A.MaToHop, Mon1, Mon2, Mon3 FROM monxettuyen as A INNER JOIN tohopmon AS B ON A.MaToHop = B.MaToHop WHERE MaNganh = '$id'";
		$resut = mysqli_query($conn, $sql);
		if($resut->num_rows >0)
		{
			while ($row = $resut->fetch_assoc())
			{
				echo "<option value='".$row['MaToHop']."'> ".$row['Mon1']."; ".$row['Mon2']."; ".$row['Mon3']."</option>";										
			}
		}
	}
?>