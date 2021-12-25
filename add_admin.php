<?php 
require 'config/config.php';

if(isset($_POST["signup"])){

  $nama = $_POST["nama"];
  $nim = $_POST["nim"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query_cek = "SELECT * FROM user WHERE nim='$nim'";
  $res = mysqli_query($connect, $query_cek);

  if(mysqli_num_rows($res)>0){

  	echo "
	    <script>
	    alert('Data sudah ada');
	    document.location.href='login.php';
	    </script>
	    ";

  }else{

  	$query_signup = "INSERT INTO user VALUES ('', '$nama', '$nim', '$email', '$password')";

	   mysqli_query($connect, $query_signup);

	  $cek = mysqli_affected_rows($connect);

	  if($cek>0){
	    echo "
	    <script>
	    alert('Sign Up Sukses');
	    document.location.href='login.php';
	    </script>
	    ";
	  }else{
	     echo "
	      <script>
	      alert('Sign Up Gagal');
	      document.location.href='login.php';
	      </script>
	      ";
	  }
  }
  //var_dump($query_signup);
}else{
	echo "
      <script>
      alert('Data tidak ada');
      document.location.href='login.php';
      </script>
      ";
}

 ?>