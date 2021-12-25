<?php
require 'config/config.php'; 

if (isset($_POST["update"])) {
	// var_dump($_POST["update"]);
	// var_dump($_POST);

	$id = $_POST["id"];
	$nilai = $_POST["new_nilai"];
	
	$query = "UPDATE result_test SET nilai='$nilai' WHERE id='$id'";

	$cek = add_table($query);

		if($cek>0 ){
			echo "
			<script>
			alert('Nilai berhasil diupdate');
			document.location.href='config_result_client.php';
			</script>
			";
		}else{
			echo "
			<script>
			alert('Nilai gagal diupdate');
			document.location.href='config_result_clientconfig_result_client.php';
			</script>
			";
		}

}else if(isset($_GET["delete"])){

	$id = $_GET["delete"];

	$query_d = "DELETE FROM result_test WHERE id=$id";

	$conf_d = delete_table($query_d);

	if($conf_d>0 ){
		echo "
		<script>
		alert('Data berhasil dihapus');
		document.location.href='config_result_client.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('Data gagal dihapus');
		document.location.href='config_result_client.php';
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

