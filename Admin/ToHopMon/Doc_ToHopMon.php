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
        <p><a href="Index.php?menu=ToHopMon&chucnang=Tao"><input type="button" class=" btn btn-primary" value="Tạo tổ hợp môn xét tuyển mới"/></a> </p>
    </div>
	<table class="table table-condensed">
        <tr>
            <th class="info" >Mã tổ hợp</th>
			<th class="info" >Môn 1</th>
            <th class="info" >Môn 2</th>
            <th class="info" >Môn 3</th>
            <th class="info">Tác vụ</th>
        </tr>
        <?php
			include_once("../PHP/define.php");
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			
            $sql = "SELECT * FROM ToHopMon";
			
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
                        echo "<td>". $row['MaToHop'] ."</td>";
						echo "<td>". $row['Mon1'] ."</td>";
						echo "<td>". $row['Mon2'] ."</td>";
						echo "<td>". $row['Mon3'] ."</td>";
                        echo "<td> 
                            <a href='index.php?menu=ToHopMon&chucnang=Sua&MaToHop=".$row['MaToHop']."'><input type='button' value='Sửa' class='btn btn-success'/></a>
                            <a href='index.php?menu=ToHopMon&chucnang=Xoa&MaToHop=".$row['MaToHop']."'> <input type='button' value='Xóa' class='btn btn-danger'/> </a>
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
		 if ($page_cr!=$i) echo "<a href='index.php?menu=ToHopMon&start=".$row_per_page*($i-1)."'><button type='button' class='btn btn-success'>".$i."</button></a>";
		 else echo "<button type='button' class='btn btn-warning'>".$i."</button>";
		
		}?>
