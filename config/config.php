<?php 

// $host = "sql212.epizy.com";
// $username = "epiz_26965805";
// $password = "Jkh31Fv7LCwRGy9";
// $db_name = "epiz_26965805_online_judge_db";
$host = "localhost";
$username = "root";
$password = "";
$db_name = "online_judge_db";
$question_query = array();

$connect = mysqli_connect($host, $username, $password, $db_name);
if(!$connect){
	echo "Connection failed";
}

function add_table($query){

	global $connect;
	
	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
}

function delete_table($query){

	global $connect;

	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
}

function query_question($id_token){

	global $connect; global $question_query;
	$query = "SELECT * FROM soal WHERE id_soal='$id_token'";

	$res = mysqli_query($connect, $query);
	$i = 0;

	while ($row = mysqli_fetch_assoc($res)) {
		$question_query[$i] = $row;
		$i++;
	}
}

function add_users_result($name, $token, $nim, $value, $src_code, $stdErr1, $stdErr2, $stdErr3, $id_admin){

	global $connect;
	$query = "INSERT INTO result_test VALUES ('', '$name', '$token', '$nim', '$value', '$src_code', '$stdErr1', '$stdErr2', '$stdErr3', '$id_admin')";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function fetch_table($query){
	global $connect;
	$result = mysqli_query($connect, $query);
	$stack = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$stack[] = $row;
	}
	return $stack;
}

function update_soal($key, $id_soal, $case_in, $case_out, $question, $ex_in, $ex_out){


	global $connect;

	$query = "UPDATE soal SET id_soal=$id_soal, stdin='$case_in',stdout='$case_out',question='$question',example_input='$ex_in',example_output='$ex_out' WHERE id=$key";

	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
}

function upd_users_result($name, $token, $nim, $value, $src_code, $stdErr1, $stdErr2, $stdErr3, $id_admin){

	global $connect;
	$query = "UPDATE result_test SET nilai = '$value', answear = '$src_code', log_err1 = '$stdErr1', log_err2 = '$stdErr2', log_err3 = '$stdErr3' WHERE nim = '$nim' AND token = '$token' ";
	
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

?>
