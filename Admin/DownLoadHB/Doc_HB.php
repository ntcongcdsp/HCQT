<?php
	/*session_start();
	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
	if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
	{
		if($_SESSION['MaPhanQuyen'] != NHOM_QUAN_TRI)
		{
			header('Location: ../PHP/Login.php');
		}
	}
	else
	{
		header('Location: ../PHP/Login.php');
	}
	*/
?>

	<div class="col-md-12" align="right">
        <p><a href="../admin/Index.php?menu=DownLoadHB&amp;chucnang=DownLoad"><input type="button" class=" btn btn-primary" value="Tải dữ liệu"/></a> </p>
    </div>
	<table class="table table-condensed">
        <tr>
            <th class="info" >Họ</th>
			<th class="info" >Tên</th>
            <th class="info" >Ngày sinh</th>
			<th class="info" >Mã ngành</th>
			<th class="info" >Tên ngành</th>
            <th class="info" >Tổ hợp môn</th>
			<th class="info" >Ngày đăng ký</th>
            <th class="info" >Tác vụ</th>
        </tr>
        <?php
			include_once("../PHP/define.php");
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			
            $sql = "SELECT A.MaTS, Ho, Ten, NgaySinh, C.MaNganh, TenNganh, MaToHop, NgayDK FROM ThiSinh AS A INNER JOIN dangkyhb AS B ON A.MaTS = B.MaTS INNER JOIN nganh AS C ON B.MaNganh = C.MaNganh WHERE HeDaoTao = 1 OR HeDaoTao = 8 ORDER BY MaTS DESC";
			
			//Code phan trang
			$row_per_page=10; // Số dòng trên mỗi trang
						
            $resultAll = mysqli_query($conn, $sql);
			
			$rows = $resultAll->num_rows;//Số dòng cần hiển thị
			//Tính số trang cần hiển thị
			if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
			else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị
			//Tính số dòng để lấy từ CSDL
			if(array_key_exists('start',$_GET))
			{
				$start = $_GET['start'];
			}
			else
				$start = 0;
				
			$sql .= " LIMIT ".$start.",".$row_per_page;

			$result = mysqli_query($conn, $sql);
			
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                        echo "<td>". $row['Ho'] ."</td>";
						echo "<td>". $row['Ten'] ."</td>";
						echo "<td>". date('d/m/Y',strtotime($row['NgaySinh'])) ."</td>";
						echo "<td>". $row['MaNganh'] ."</td>";
						echo "<td>". $row['TenNganh'] ."</td>";
						echo "<td>". $row['MaToHop'] ."</td>";
						echo "<td>". date('d/m/Y',strtotime($row['NgayDK'])) ."</td>";
                        echo "<td> 
                            <a href='index.php?menu=DownLoadHB&chucnang=Sua&ID=".$row['MaTS']."'><input type='button' value='Sửa' class='btn btn-success'/></a>
                            <a href='index.php?menu=DownLoadHB&chucnang=Xoa&ID=".$row['MaTS']."'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>
                            </td>";
                    echo "</tr>";
                }
            }
            ConnectDB::disconnect();
        ?>
	</table>
        <?php
		
		//bắt đầu phân trang
		$page_cr=($start/$row_per_page)+1;
		//echo "<h4><span class='bg-primary'>". $page_cr."</span></h4>";
		for($i=1;$i<=$page;$i++)
		{
		 if ($page_cr!=$i) echo "<a href='index.php?menu=DownLoadHB&start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-warning'>".$i."</button>";
		
		}?>

