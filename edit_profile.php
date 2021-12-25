<?php 

require 'config/config.php';

if(isset($_POST["submit"])){

	$id = $_POST["id"];
	$nama = $_POST["nama"];
	$nim = $_POST["nim"];
	$email = $_POST["email"];
	$password = $_POST["password"];

		$query1 = "UPDATE user SET nama='$nama', nim='$nim', email='$email', password='$password' WHERE id='$id'";
		
		$conf1 = add_table($query1);

		if($conf1>0 ){
			echo "
			<script>
			alert('Data berhasil diubah');
			document.location.href='admin_config.php';
			</script>
			";
		}else{
			echo "
			<script>
			alert('Data gagal diubah');
			document.location.href='admin_config.php';
			</script>
			";
		}

}else{
	echo "
			<script>
			alert('Anda Belum Login');
			document.location.href='login.php';
			</script>
			";
}

 ?>