<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>PHÒNG HÀNH CHÍNH QUẢN TRỊ - TRƯỜNG CAO ĐẲNG SƯ PHẠM THỪA THIÊN HUẾ
	        </div>
    	    <div class="panel-body">
				<div style="position:relative;right:20px;">
                	<ul>
                    	<?php
							include_once("./PHP/define.php");
							require_once("./PHP/ConnectDB.php");
							$conn = ConnectDB::connect();
							
							$sql = "SELECT * FROM TinTuc ORDER BY ID DESC";
	
							$result = mysqli_query($conn, $sql);
							
							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									echo $row['NoiDung'];
								}
							}
							ConnectDB::disconnect();
							?>
					</ul>
                </div>
			</div>
		</div>
	</div>
</div>