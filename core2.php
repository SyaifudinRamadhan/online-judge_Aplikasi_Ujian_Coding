<?php 
session_start();

require 'config/config.php';


if(!isset($_SESSION["login"]) && !isset($_SESSION["token"])){
	echo "
	<script>
		alert('Anda dilarang massuk sebelum login');
		setTimeout(function(){window.location.href='login.php'},2000);
	</script>";
	//header("Location:login.php");
}else{

	if(isset($_GET["token1"])){

		$nim = $_SESSION["login"];
		$id_soal = $_SESSION["token"];

		// $query_res = "SELECT * FROM result_test WHERE nim='$nim' AND token='$id_soal'";

		// $res = mysqli_query($connect, $query_res);


		// if(mysqli_num_rows($res) >= 1){

		// 	echo "
		// 	<script>
		// 	alert('Anda sudah pernah menjawab soal ini');
		// 	document.location.href='dashboard.php';
		// 	</script>
		// 	";

		// }else{

			$token = [$_GET["token1"], $_GET["token2"], $_GET["token3"]];
			$src_code = $_GET["sc"];
			$nim = $_SESSION["login"];
			$nilai_s = array();
			$query = "SELECT * FROM client WHERE nim='$nim'";
			$data_client = fetch_table($query)[0];
			// var_dump($token);
			query_question($id_soal);

			$response = array();;
			$err = array();
			$std_out = array();
			
			for ($i=0; $i < 3; $i++) { 
			   $curl = curl_init();
			   $url = "https://judge0.p.rapidapi.com/submissions"."/".$token[$i];
				curl_setopt_array($curl, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => array(
						"x-rapidapi-host: judge0.p.rapidapi.com",
						"x-rapidapi-key: fa4dcc5e85mshd03a67fefbfe166p1ef474jsnd47d695027ff"
					),
				));

				$response[$i] = json_decode(curl_exec($curl));

				$err[$i] = curl_error($curl);

				curl_close($curl);

				$std_out[$i] = base64_encode($response[$i]->stdout);
				$expected_output = $question_query[$i]["stdout"];

				//compare stdout
				if(strcmp($std_out[$i], $expected_output) === 0){
					$nilai_s[$i] = 33.3;
				}
				else{
					$nilai_s[$i] = 10;
				}
			}

			$value = $nilai_s[0]+$nilai_s[1]+$nilai_s[2];
			$stdErr1 = $response[0]->stderr;
			$stdErr2 = $response[1]->stderr;
			$stdErr3 = $response[2]->stderr;

				//insert result test to db
			$status = upd_users_result($data_client["nama"], $_SESSION["token"], $_SESSION["login"], $value, $src_code, $stdErr1, $stdErr2, $stdErr3,$data_client["id_admin"]);
      // var_dump($data_client["nama"], $_SESSION["token"], $_SESSION["login"], $value, $src_code, $stdErr1, $stdErr2, $stdErr3);

			if($status < 0){
				echo "
				<script>
					alert('Hasil test gagal dimuat ke database');
				</script>";
			}else{
				echo "
				<script>
					alert('Hasil test sukses dimuat ke database');
				</script>";
			}

		//}
   
	}else{
		echo "
		<script>
			alert('Token belum di buat');
		</script>";
	 }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/design.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/submissons.js"></script>

    <title>Online Judge IDE Software</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

    <a class="navbar-brand ml-5" style="font-weight: bold; font-family: ">SELAMAT DATANG |</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <a class="navbar-brand" style=" font-family: ">ADMINISTRATOR UJIAN LIVE CODING | <?php echo $name; ?></a>
      
        <ul class="nav justify-content-center ml-auto bg-danger  ">
          <li class="nav-item dropdown">
            <a class="nav-link text-white justify-content-center" onclick="logout()" role="button" aria-haspopup="true" aria-expanded="false" >LOGOUT</a>
          </li>
        </ul>

    </div>    

    </nav>

    <div class="row no-gutters mt-5 style="overflow-x: hidden;"">
      <div class="col-md-2 bg-dark pt-3 pb-5 ">
        <ul class="nav flex-column bg-dark text-white ml-3 mb-5 pb-5">
          <li class="nav-item">
            <a class="nav-link text-white" href="dashboard.php"><i class="icon fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr class="bg-secondary"></hr>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="start_test.php"><i class="fas fa-edit mr-3"></i>Mulai Test</a><hr class="bg-secondary"></hr>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="result_test.php"><i class="fas fa-poll-h mr-3"></i>Hasil Test</a><hr class="bg-secondary"></hr>
          </li>
          
          <li class="nav-item">
            <a class=" text-white"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-white"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-white"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-white"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-white"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-dark"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-dark"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-dark"></a><hr class="bg-dark"></hr>
          </li>
           <li class="nav-item">
            <a class=" text-dark"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-dark"></a><hr class="bg-dark"></hr>
          </li>
          <li class="nav-item">
            <a class=" text-dark"></a><hr class="bg-dark"></hr>
          </li>
          
        </ul>
      </div>
      <div class="col-md-9 ml-5" style="overflow-x: auto;">
        <h3 class="m-5"><i class="fas fa-poll-h mr-3"></i>Hasil test<hr class="bg-secondary"></hr></h3>
        
        <div class="row ml-5">
          
         <div class="card ml-5">
            <div class="card-header bg-success">
              Hasil Test Sementara
            </div>
            <div class="card-body">
                <h5 class="card-title">HASIL NILAI SEMENTARA TEST ANDA</h5>
                <p class="card-text">1. Nilai test ini hanya bersifat sementara. Kedepannya hasil jawaban yang telah dikrim peserta akan di cek lagi oleh admin <br>2. Tampilan  nilai semntara ini hanya  bisa diakses satu kali <br>3. Nilai fix atau tetap bisa di cek di bagian Hasil Test <br><br>NILAI SEMENTARA ANDA : <br><?php echo $value ?></p>
            </div>
          </div>
        </div>
          <!-- tag clode div row -->
        </div>

        <!-- div close by col md 10 -->
      </div>

    <!-- close div by no gutters -->
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
  </body>
</html>