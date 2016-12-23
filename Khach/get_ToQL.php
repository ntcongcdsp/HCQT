<?php
	include_once("../PHP/ConnectDB.php");
	if($_POST['MaTo'])
	{
		$conn = ConnectDB::connect();
		$id=$_POST['MaTo'];
		
		$sql = "SELECT * FROM CBGV WHERE MaTo = '$id' ORDER BY Ten DESC";
		$resut = mysqli_query($conn, $sql);

        if($resut->num_rows >0)
        {
        	$i=0;
        	echo '<table class="table table-bordered col-xs-12" style="margin-top:20px" >';
        		echo "<tr>";
        			echo '<th style="text-align:center;vertical-align:middle" width="5%" class="info">STT</th>';
        			echo '<th style="text-align:center;vertical-align:middle" width="15%" class="info">Họ</th>';
        			echo '<th style="text-align:center;vertical-align:middle" width="10%" class="info">Tên</th>';
        			echo '<th style="text-align:center;vertical-align:middle" width="10%" class="info">Trình độ</th>';
        			echo '<th style="text-align:center;vertical-align:middle" width="10%" class="info">Chức vụ</th>';
        		echo "</tr>";
          	while ($row = $resut->fetch_assoc())
            {
            	$i++;
            	echo "<tr>";
            	echo '<td style="text-align:center;vertical-align:middle">'. $i. '</td>';
            	echo "<td>".$row['Ho']."</td>";
            	echo "<td>".$row['Ten']."</td>";
            	echo '<td style="text-align:center;vertical-align:middle">'.$row['TrinhDo']."</td>";
            	echo '<td style="text-align:center;vertical-align:middle">'.$row['ChucVu']."</td>";
            	echo "</tr>";
			}
			echo "</table>";
		}
	}
?>