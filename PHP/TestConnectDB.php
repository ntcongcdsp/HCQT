<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Test Connect Database FindMyPet</title>
</head>

<body>

<?php
//Server local dùng để test web, chức năng
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FindMyPet";*/

//Server internet dùng để nhập dữ liệu chung của nhóm
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HCQT";


// Tao ket noi
$conn = new MySQLi($servername, $username, $password, $dbname);
$conn->set_charset('utf8');

if($conn->connect_error)
{
	echo "Ket noi that bai: ".$conn->connect_error;
}
echo "Ket noi thanh cong";
?>
</body>
</html>