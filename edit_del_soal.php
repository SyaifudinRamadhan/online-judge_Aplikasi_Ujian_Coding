<?php
require 'config/config.php'; 

if (isset($_POST["update"])) {
	// var_dump($_POST["update"]);
	// var_dump($_POST);


	$key1 = $_POST["key"]+0;
	$key2 = $_POST["key"]+1;
	$key3 = $_POST["key"]+2;
	$id_soal = $_POST["token_soal"];
	$case_in_1 = base64_encode($_POST["stdin1"]);
	$case_in_2 = base64_encode($_POST["stdin2"]);
	$case_in_3 = base64_encode($_POST["stdin3"]);
	$case_out_1 = base64_encode($_POST["stdout1"]);
	$case_out_2 = base64_encode($_POST["stdout2"]);
	$case_out_3 = base64_encode($_POST["stdout3"]);
	$question = $_POST["soal"];
	$ex_in = $_POST["ex_input"];
	$ex_out = $_POST["ex_output"];
	$id_admin = $_POST["id_admin"];

	// var_dump($key1, $key2, $key3, $id_soal, $case_in_1, $case_in_2, $case_in_3, $case_out_1, $case_out_2, $case_out_3, $question, $ex_in, $ex_out);

		$cek1 = update_soal($key1, $id_soal, $case_in_1, $case_out_1, $question, $ex_in, $ex_out);
		$cek2 = update_soal($key2, $id_soal, $case_in_2, $case_out_2, " ", " ", " ");
		$cek3 = update_soal($key3, $id_soal, $case_in_3, $case_out_3, " ", " ", " ");

		if($cek1>0 && $cek2>0 && $cek3>0 ){
			echo "
			<script>
			alert('Data berhasil diupdate');
			document.location.href='input_question.php';
			</script>
			";
		}else{
			echo "
			<script>
			alert('Data gagal diupdate');
			document.location.href='input_question.php';
			</script>
			";
		}

}else if(isset($_POST["submit"])){
	$id_admin = $_POST["id_admin"];
	$id_soal = $_POST["token_soal"];
	$case_in_1 = base64_encode($_POST["stdin1"]);
	$case_in_2 = base64_encode($_POST["stdin2"]);
	$case_in_3 = base64_encode($_POST["stdin3"]);
	$case_out_1 = base64_encode($_POST["stdout1"]);
	$case_out_2 = base64_encode($_POST["stdout2"]);
	$case_out_3 = base64_encode($_POST["stdout3"]);
	$question = $_POST["soal"];
	$ex_in = $_POST["ex_input"];
	$ex_out = $_POST["ex_output"];

	$cek = mysqli_query($connect, "SELECT * FROM soal WHERE id_soal=$id_soal AND id_admin=$id_admin");
	if(mysqli_num_rows($cek)>0){
		echo "
		<script>
		alert('ID SOAL sudah ada');
		document.location.href='input_question.php';
		</script>
		";
	}else{
		$query1 = "INSERT INTO soal VALUES('', '$id_soal', '$case_in_1', '$case_out_1', '$question', '$ex_in', '$ex_out', '$id_admin')";
		$query2 = "INSERT INTO soal VALUES('', '$id_soal', '$case_in_2', '$case_out_2', '', '', '', '$id_admin')";
		$query3 = "INSERT INTO soal VALUES('', '$id_soal', '$case_in_3', '$case_out_3', '', '', '', '$id_admin')";

		$conf1 = add_table($query1);
		$conf2 = add_table($query2);
		$conf3 = add_table($query3);

		if($conf1>0 && $conf2>0 && $conf3>0 ){
			echo "
			<script>
			alert('Data berhasil ditambahkan');
			document.location.href='input_question.php';
			</script>
			";
		}else{
			echo "
			<script>
			alert('Data gagal ditambahkan');
			document.location.href='input_question.php';
			</script>
			";
		}
	}

	

}else if(isset($_GET["delete"])){

	$id_soal = $_GET["delete"];
	$id_admin = $_GET["id"];

	$query_d = "DELETE FROM soal WHERE id_soal=$id_soal AND id_admin=$id_admin";

	$conf_d = delete_table($query_d);

	if($conf_d>0 ){
		echo "
		<script>
		alert('Data berhasil dihapus');
		document.location.href='input_question.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('Data gagal dihapus');
		document.location.href='input_question.php';
		</script>
		";
	}
}else{

		echo "
		<script>
		alert('Anda belum login');
		document.location.href='login.php';
		</script>
		";
	
}
	// var_dump($_POST);
 ?>