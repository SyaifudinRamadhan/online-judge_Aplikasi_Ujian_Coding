<?php
require 'config/config.php'; 

if (isset($_POST["update"])) {
	// var_dump($_POST["update"]);
	// var_dump($_POST);

	$id = $_POST["id"];
	$nama = $_POST["nama"];
	$nim = $_POST["nim"];
	$password = $_POST["password"];

	
	$query = "UPDATE client SET nama='$nama', nim='$nim', password='$password' WHERE id='$id'";

	$cek = add_table($query);

		if($cek>0 ){
			echo "
			<script>
			alert('Data berhasil diupdate');
			document.location.href='config_client.php';
			</script>
			";
		}else{
			echo "
			<script>
			alert('Data gagal diupdate');
			document.location.href='config_client.php';
			</script>
			";
		}

}else if(isset($_POST["submit"])){

	$id_admin = $_POST["id_admin"];
	$nama = $_POST["nama"];
	$nim = $_POST["nim"];
	$password = $_POST["password"];

	$res_cek = mysqli_query($connect, "SELECT * FROM client WHERE nim='$nim'");

		if(mysqli_num_rows($res_cek)>0){

			echo "
				<script>
				alert('NIM sudah ada / NIM ada yang kembar');
				document.location.href='config_client.php';
				</script>
				";

		}else{

			$query1 = "INSERT INTO client VALUES('', '$nama', '$nim', '$password', '$id_admin')";
		
			$conf1 = add_table($query1);

			if($conf1>0 ){
				echo "
				<script>
				alert('Data berhasil ditambahkan');
				document.location.href='config_client.php';
				</script>
				";
			}else{
				echo "
				<script>
				alert('Data gagal ditambahkan');
				document.location.href='config_client.php';
				</script>
				";
			}

		}

}else if(isset($_GET["delete"])){

	$id = $_GET["delete"];

	$query_d = "DELETE FROM client WHERE id=$id";

	$conf_d = delete_table($query_d);

	if($conf_d>0 ){
		echo "
		<script>
		alert('Data berhasil dihapus');
		document.location.href='config_client.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('Data gagal dihapus');
		document.location.href='config_client.php';
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

