<?php 
session_start();
// require 'config/config.php';

$token = $_SESSION["token"];

// $host = "sql212.epizy.com";
// $username = "epiz_26965805";
// $password = "Jkh31Fv7LCwRGy9";
// $db_name = "epiz_26965805_online_judge_db";
$host = "localhost";
$username = "root";
$password = "";
$db_name = "online_judge_db";


$connect1 = mysqli_connect($host, $username, $password, $db_name);
if(!$connect1){
	echo "Connection failed";
}


$nim = $_SESSION["login"];
$query1 = "SELECT * FROM client WHERE nim='$nim'";
$res = mysqli_query($connect1, $query1);
$data_client = mysqli_fetch_assoc($res);
$id_admin = $data_client["id_admin"];


$data = array();

$query = "SELECT * FROM soal WHERE id_soal='$token' AND id_admin='$id_admin'";
$result = mysqli_query($connect1, $query);

while ($row = mysqli_fetch_assoc($result)) {
	
	$data[] = $row;

}

echo json_encode($data);

 ?>