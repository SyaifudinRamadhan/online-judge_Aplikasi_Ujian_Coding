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

  $query = "SELECT * FROM user WHERE id='$id_admin'";
 

  $res_admin = fetch_table($query);

  // var_dump($id_admin);


}else if(isset($_SESSION["s_admin"])){

  $name = $_SESSION["s_admin"];
  $id_admin = $_SESSION["id_s_admin"];

  $query = "SELECT * FROM super_admin";
 

  $res_admin = fetch_table($query);


}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

<!DOCTYPE html>
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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


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
      <div class="col-md-2 bg-dark pt-3 " style="padding-bottom: 23% !important;">
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
        <h3 class="m-5"><i class="fas fa-user-cog mr-3"></i>Config Admin<hr class="bg-secondary"></hr></h3>

        <div class="row ml-5 text-white">
          
           <div class="card mr-5" style="width: 1200px">
            <div class="card-header bg-success">
              Petunjuk
            </div>
           <div class="card-body text-dark">
                <h5 class="card-title">Halaman Kelola Profile</h5>
                <p class="card-text">
                	1. Profile pertama dibuat  dengan input dari calon pengguna melalui Sign Up<br>
                	2. Penggantiqan komponen profile bisa dilakukan satu satu (tanpa harus semua diedit <br>
                	3. Card dibawah ini hanya menampilkan isi profile anda<br>
                	4. Untuk mengganti anda bisa mnekan tombol edit <br>
                	
                </p>
              </div>
            </div>

        </div>

         <div class="row ml-5 mt-5 text-white">
          
          <div class="card " style="margin-left: 30%">
            <div class="card-header bg-info" style="text-align: center">
              Your Profile
            </div>
            <div class="card-body text-dark" style="text-align: center">
              <h5 class="card-title">Tentang Anda</h5><br><br>
              <h6 class="card-title">Nama : <?php echo $res_admin[0]["nama"] ?></h6>
              <h6 class="card-title">NIM : <?php echo $res_admin[0]["nim"] ?></h6>
              <h6 class="card-title">E-Mail : <?php echo $res_admin[0]["email"] ?></h6>
              <h6 class="card-title">Password : <?php echo $res_admin[0]["password"] ?></h6>
             
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">Edit Profile</button>
            </div>
          </div>

        </div>


        <div class="row ml-5 mt-5">

			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <form action="edit_profile.php" method="POST">
			      	<div class="modal-body">

			      		<!-- iout token -->
                <input type="hidden" name="id" value="<?php echo $res_admin[0]["id"] ?>">
    			      <div class="form-group">
    						 <label for="exampleFormControlInput1">Nama</label>
    						 <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="<?php echo $res_admin[0]['nama'] ?>">
    					  </div>
                 <div class="form-group">
                 <label for="exampleFormControlInput1">NIM</label>
                 <input type="text" name="nim" class="form-control" id="exampleFormControlInput1" value="<?php echo $res_admin[0]['nim'] ?>">
                </div>
                 <div class="form-group">
                 <label for="exampleFormControlInput1">E-Mail</label>
                 <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $res_admin[0]['email'] ?>">
                </div>
                 <div class="form-group">
                 <label for="exampleFormControlInput1">Password</label>
                 <input type="text" name="password" class="form-control" id="exampleFormControlInput1"value="<?php echo $res_admin[0]['password'] ?>">
                </div>
    					 

				    </div>
				    <div class="modal-footer">
				      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				    </div>
			      </form>
			    </div>
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
 
 </body>
 </html>