<?php
	include_once("../PHP/ConnectDB.php");
	if($_POST['id'])
	{
		$conn = ConnectDB::connect();
		$id=$_POST['id'];
		
		$sql = "SELECT * FROM Huyen WHERE MaTinh = '$id'";
		$resut = mysqli_query($conn, $sql);

        if($resut->num_rows >0)
        {
          	while ($row = $resut->fetch_assoc())
            {
				echo "<option value='".$row['MaHuyen']."'> (".$row['MaHuyen'].") ".$row['TenHuyen']."</option>";										
			}
		}
	}
?>