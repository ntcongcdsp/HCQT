<table class="table table-bordered col-xs-12" >
    
    <tr>
        <th style="text-align:center;vertical-align:middle" class="info">Họ</th>
        <th style="text-align:center;vertical-align:middle" class="info">Tên</th>
        <th style="text-align:center;vertical-align:middle" class="info">Ngành xét tuyển</th>
        <th style="text-align:center;vertical-align:middle" class="info">P.Án xét tuyển</th>
        <th style="text-align:center;vertical-align:middle" class="info">Ngày đăng ký</th>
        <th style="text-align:center;vertical-align:middle" class="info">Tình trạng</th>
    </tr>
<?php
    include_once("../PHP/ConnectDB.php");
    if($_POST['SoCMND'] && $_POST['SoDT'])
    {
        $conn = ConnectDB::connect();
        $SoCMND=$_POST['SoCMND'];
        $SoDT = $_POST['SoDT'];
        
        $sqlThiSinh = "SELECT A.MaTS, Ho, Ten, TenNganh, NgayDK, TinhTrang FROM thisinh AS A INNER JOIN DangKyCD AS B ON A.MaTS = B.MaTS INNER JOIN Nganh AS C ON B.MaNganh = C.MaNganh  WHERE SoCMND='$SoCMND' AND SoDT='$SoDT'";
        
		$resut = mysqli_query($conn, $sqlThiSinh);
        if($resut->num_rows >0)
        {			
            while ($row = $resut->fetch_assoc())
            {
                echo "<tr style='text-align:center;vertical-align:middle'>";
                    echo "<td>". $row['Ho'] ."</td>";
                    echo "<td>". $row['Ten'] ."</td>";
					echo "<td align='center'>". $row['TenNganh'] ."</td>";
					echo "<td align='center'>Điểm THPT Quốc gia</td>";
					echo "<td align='center'>". date('d/m/Y',strtotime($row['NgayDK']))."</td>";
					
					//Tinh Trang = 0 Chua xet tuyen
					//Tinh Trang = 1 Khong Trung Tuyen
					//Tinh Trang = 2 Trung Tuyen
					
					echo "<td align='center'>". $HT = $row['TinhTrang']==0 ? 'Chưa xét tuyển' : ($row['TinhTrang']==1 ? 'Không trúng tuyển' : 'Trúng tuyển') ."</td>";
                    
                echo "</tr>";							
            }
        }
		$sqlThiSinh = "SELECT Ho, Ten, TenNganh, NgayDK, TinhTrang FROM thisinh AS A INNER JOIN DangKyHB AS B ON A.MaTS = B.MaTS INNER JOIN Nganh AS C ON B.MaNganh = C.MaNganh  WHERE SoCMND='$SoCMND' AND SoDT='$SoDT'";
        
		$resut = mysqli_query($conn, $sqlThiSinh);
        if($resut->num_rows >0)
        {			
            while ($row = $resut->fetch_assoc())
            {
                echo "<tr style='text-align:center;vertical-align:middle'>";
                    echo "<td>". $row['Ho'] ."</td>";
                    echo "<td>". $row['Ten'] ."</td>";
					echo "<td align='center'>". $row['TenNganh'] ."</td>";
					echo "<td align='center'>Điểm học bạ</td>";
					echo "<td align='center'>". date('d/m/Y',strtotime($row['NgayDK']))."</td>";
					echo "<td align='center'>". $HT = $row['TinhTrang']==0 ? 'Chưa xét tuyển' : ($row['TinhTrang']==1 ? 'Không trúng tuyển' : 'Trúng tuyển')."</td>";
                echo "</tr>";							
            }
        }
    }
?>
</table>

