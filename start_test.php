<?php 
session_start();
require 'config/config.php';

if(!isset($_SESSION["login"])){

  echo "
  <script>
  alert('Anda dilarang masuk sebelum login !!!');
  document.location.href='login.php';
  </script>
  ";

}else if(isset($_SESSION["login"])){

  $name = $_SESSION["login"];

  $query = "SELECT * FROM client WHERE nim = '$name'";
  $res = mysqli_query($connect, $query);
  $data = mysqli_fetch_assoc($res);

}



//akhir tag php
 ?>


<!doctype html>
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

    <div class="row no-gutters mt-5" style="overflow-x: hidden;">
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
        <h3 class="mt-5"><i class="fas fa-edit mr-3"></i>Mulai Test</a><hr class="bg-secondary"></hr></h3>
        <div class="row ml-5">
          <div class="card ml-5 ">
            <div class="card-header bg-success">
              Petunjuk Masuk Web IDE
            </div>
            <div class="card-body">
                <h5 class="card-title">Perhatikan Petunjuk Sebelum Memulai </h5>
                <p class="card-text">1. Peserta akan diberikan token soal untuk mengerjakan test <br>2. Tiap token hanya bisa untuk mengakses 1 soal test <br>3. Satu token bisa digunakan walaupun peserta keluar dari web. Tetapi tidak bisa untuk melakukan resending jawaban <br>4. Jika peserta logout atau keluar saat test masih bisa untuk test lagi dengan token yang sama selama waktu masih berlaku <br>5. Token yang diberikan kepada peserta harus diinputkan pada kolom input token untuk memulai test <br> Semoga Sukses :)</p>
            </div>
          </div>
        </div>
        <div class="row m-5 p-5">
          
          <form action="test.php" method="POST" class="form-inline ml-5 pl-5" style="margin-left: 400px">
            <div class="form-group mx-sm-3 mb-2">
              <label class="text-dark">Token Login Test : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
              <input type="text" name="token" class="form-control" required="" placeholder="Token">
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-2">Start Test</button>
          </form>

        </div>
      </div>


   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUt -->OBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>