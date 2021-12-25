<?php 
session_start();
require 'config/config.php';


if(!isset($_SESSION["admin"]) && !isset($_SESSION["s_admin"])){

  echo "
  <script>
  alert('Useername tidak tersedia');
  document.location.href='login.php';
  </script>
  ";

}else if(isset($_SESSION["admin"])){

  $id_admin = $_SESSION["id_admin"];
  $name = $_SESSION["admin"];

  $query = "SELECT * FROM client WHERE id_admin='$id_admin'";
  $query2 = "SELECT * FROM soal WHERE id_admin='$id_admin'";
  $query3 = "SELECT * FROM result_test WHERE id_admin='$id_admin'";

  $res_client = mysqli_query($connect, $query);
  $res_soal = mysqli_query($connect, $query2);
  $res_res = mysqli_query($connect, $query3);

  $jml_client = mysqli_num_rows($res_client);
  $jml_soal = mysqli_num_rows($res_soal);
  $jml_res = mysqli_num_rows($res_res);


}else if(isset($_SESSION["s_admin"])){

  $name = $_SESSION["s_admin"];

  $query = "SELECT * FROM client";
  $query2 = "SELECT * FROM soal";
  $query3 = "SELECT * FROM result_test";

  $res_client = mysqli_query($connect, $query);
  $res_soal = mysqli_query($connect, $query2);
  $res_res = mysqli_query($connect, $query3);

  $jml_client = mysqli_num_rows($res_client);
  $jml_soal = mysqli_num_rows($res_soal);
  $jml_res = mysqli_num_rows($res_res);


}


 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- 
     -->
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

    <div class="row no-gutters mt-5" style="overflow-x: hidden;">
      <div class="col-md-2 bg-dark pt-3 " style="padding-bottom: 23% !important;" >
        <ul class="nav flex-column bg-dark text-white ml-3 mb-5 pb-5">
          <li class="nav-item">
            <a class="nav-link text-white" href="administrator.php"><i class="icon fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr class="bg-secondary"></hr>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="input_question.php"><i class="fas fa-edit mr-3"></i>Kelola Soal</a><hr class="bg-secondary"></hr>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="config_client.php"><i class="fas fa-user-alt mr-3"></i>Kelola Peserta</a><hr class="bg-secondary"></hr>
          </li>
          
          <li class="nav-item">
            <a class="nav-link text-white" href="admin_config.php"><i class="fas fa-user-cog mr-3"></i>Edit Profile</a><hr class="bg-secondary"></hr>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="config_result_client.php"><i class="fas fa-poll-h mr-3"></i>Kelola Hasil Test</a><hr class="bg-secondary"></hr>
          </li>
          
          
        </ul>

        

      </div>
      <div class="col-md-10">
        <h3 class="m-5"><i class="icon fas fa-tachometer-alt mr-3"></i>Dashboard<hr class="bg-secondary"></hr></h3>
        <div class="row ml-5 text-white">
          
          <div class="card bg-primary mr-5 mb-5" style="width: 24rem;">
            <div class="card-body">
              <div class="card-body-icon" style="z-index: 0; opacity: 50%; top: 25px; right: 10px;
                position: absolute; font-size: 90px"><i class="fas fa-user-alt "></i></div>
              <h5 class="card-title">Jumlah Peserta</h5>
              <div class="display-4" style="font-weight: bold;"><?php echo $jml_client ?></div>
              <a href="config_client.php"><p class="card-text text-white">Lihat detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-warning mr-5 mb-5" style="width: 24rem;">
            <div class="card-body">
              <div class="card-body-icon" style="z-index: 0; opacity: 50%; top: 25px; right: 10px;
                position: absolute; font-size: 90px"><i class="fas fa-edit"></i></div>
              <h5 class="card-title">Jumlah Soal</h5>
              <div class="display-4" style="font-weight: bold;"><?php echo $jml_soal/3 ?></div>
              <a href="input_question.php"><p class="card-text text-white">Lihat detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-success mb-5" style="width: 24rem;">
            <div class="card-body">
              <div class="card-body-icon" style="z-index: 0; opacity: 50%; top: 25px; right: 10px;
                position: absolute; font-size: 90px"><i class="fas fa-poll-h "></i></div>
              <h5 class="card-title">Jumlah Pelaksanaan Test</h5>
              <div class="display-4" style="font-weight: bold;"><?php echo $jml_res ?></div>
              <a href="config_result_client.php"><p class="card-text text-white">Lihat detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

        </div>

        <div class="row ml-5 mt-5 text-white">
          
           <div class="card mr-5 mt-5">
            <div class="card-header bg-success">
              Pengantar
            </div>
           <div class="card-body text-dark">
                <h5 class="card-title">Selamat Datang di Website Test Live Coding</h5>
                <p class="card-text">Software ini menawarkan 3x tesst case dengan perintah input dan hasil output yang sudah ditentukan oleh admin. Untuk para peserta bisa memilih bahasa pemrograman yang tersedia di IDE nanti. Web ini juga dilengkapi fitur uji coba source code sebelum di sumbit dengan menyediakan from untuk stdin dan stdout. Selamat mengerjakan, Semoga Sukses :)</p>
              </div>
            </div>

        </div>

      </div>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>