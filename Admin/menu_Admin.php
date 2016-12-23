
<?php
	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
?>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#00008B;">
		<div class="container" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
					<span class="sr-only">Đây là menu mobile</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <?php
					echo "<a class='navbar-brand' href='".BASE_URL."index.php'>Trang chủ</a></li>";
				?>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;  ">
				<ul class="nav navbar-nav">
					<?php
						
						echo "<li class='active'><a href='".BASE_URL_Admin."Index.php?menu=AdminPanel'>Danh mục chức năng</a></li>";
						echo "<li role='presentation' class='dropdown' class='active'>";
							echo "<a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> Tải dữ liệu <span class='caret'></span></a>";
							echo '<ul class="dropdown-menu">';
							echo "<li><a href='".BASE_URL_Admin."Index.php?menu=DownLoadTHPT'>Tải dữ liệu xét tuyển Cao đẳng dựa vào Điểm thi THPT Quốc Gia </a></li>";
							echo "<li><a href='".BASE_URL_Admin."Index.php?menu=DownLoadHB'>Tải dữ liệu xét tuyển Cao đẳng dựa vào Học bạ </a></li>";
							echo "<li><a href='".BASE_URL_Admin."Index.php?menu=DownLoadTC'>Tải dữ liệu xét tuyển Trung cấp</a></li>";
							echo '</ul>';
						echo "</li>";
						
						echo "<li class='active'><a href='".BASE_URL_Admin."Index.php?menu=CapNhatHoSo'>Cập nhật hồ sơ</a></li>";
						echo "<li class='active'><a href='".BASE_URL_Admin."Index.php?menu=News'>Quản lý tin tức</a></li>";

					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                	<?php
						/*include_once(realpath(dirname(__DIR__))."/PHP/define.php");	
                        require_once("../PHP/ConnectDB.php");
                        $conn = ConnectDB::connect();							
                        $sqlBV = "SELECT count(ID) FROM BaiViet WHERE KiemDuyet = ".CHUA_KIEM_DUYET;
                        $resutBV = mysqli_query($conn, $sqlBV);
						$countBV = $resutBV->fetch_row();

						if($countBV[0] != 0)
						{
							echo "<li class='active' ><a href='QLBaiViet.php' style='color:red;font-size:14px'><span class='glyphicon glyphicon-book'>".$countBV[0]."</span></a></li>";
						}
						
						$sqlBL = "SELECT count(ID) FROM BinhLuan WHERE KiemDuyet = ".CHUA_KIEM_DUYET;
                        $resutBL = mysqli_query($conn, $sqlBL);
						$countBL = $resutBL->fetch_row();

						if($countBL[0] != 0)
						{
							echo "<li class='active' ><a href='QLBinhLuan.php' style='color:red;font-size:14px'><span class='glyphicon glyphicon-envelope'>".$countBL[0]."</span></a></li>";
						}
						ConnectDB::disconnect();*/
                    ?>
					<li class="active"><a href="../PHP/Logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
					<!--<li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng kí</a></li>-->
      			</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>