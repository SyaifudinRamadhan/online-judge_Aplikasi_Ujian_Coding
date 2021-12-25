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

  $res_client = fetch_table($query);
  $res_soal = fetch_table($query2);
  $res_res = fetch_table($query3);


}else if(isset($_SESSION["s_admin"])){

  $name = $_SESSION["s_admin"];
  $id_admin = $_SESSION["id_s_admin"];

  $query = "SELECT * FROM client";
  $query2 = "SELECT * FROM soal";
  $query3 = "SELECT * FROM result_test";

  $res_client = fetch_table($query);
  $res_soal = fetch_table($query2);
  $res_res = fetch_table($query3);


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
      <div class="col-md-10" style="overflow-x: auto;">
        <h3 class="m-5"><i class="fas fa-poll-h mr-3"></i>Kelola Hasil Test<hr class="bg-secondary"></hr></h3>

        <div class="row ml-5 text-white">
          
           <div class="card mr-5">
            <div class="card-header bg-success">
              Petunjuk
            </div>
           <div class="card-body text-dark">
                <h5 class="card-title">Halaman Kelola dan Edit Hasil Testl</h5>
                <p class="card-text">
                	1. Hasil test dari massing masing pesserta akan disimpan di database dan akn ditampilakn di table di bawah ini. <br>
                	2. Hasil test kan menampilkan semua laporan peserta saat test baik dari log error, hasil codingan peserta, token soal, serta nilai.  <br>
                	3. Hasil test tidak bisa dibuat secara manual. Namun anda diizinkan untuk mengedit nilai hasil test karena anda bisa mengoreksi hasil testnya. <br>
                	4. Hasil codingan peserta yang disimpan di database akan ditampilkan di table ini dalam bentuk text area. Sehingga anda bisa melihatnya dengan lebih jelas<br>
                
                </p>
              </div>
            </div>

        </div>

        <div class="row ml-5 mt-5">
        	
		<!-- 	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
			  + Tambah Soal
			</button> -->

			<!-- Modal -->
			

        </div>

        <div class="row ml-5 mt-5 text-white" style="margin-bottom: 205px;">
          
          <table class="table table-striped " style="width: 1200px">
            <thead class="thead-dark">
              <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Token</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Nilai</th>
                <th scope="col">Jawaban</th>
                <th scope="col">Log err1</th>
                <th scope="col">Log err2</th>
                <th scope="col">Log err3</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php for ($a=0; $a<sizeof($res_res); $a++) :?>
              <tr>

                 <script type="text/javascript">
                    function confirm_d(){
                      var konfirm = confirm("Yakin ingin menghapusnya ?");
                      if(konfirm == true){
                         document.location.href = "edit_del_result.php?delete=<?php echo $res_res[$a]["id"] ?>";
                        }
                      }
                  </script>

                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $res_res[$a]["token"] ?></td>
                <td><?php echo $res_res[$a]["nama"] ?></td>
                <td><?php echo $res_res[$a]["nim"] ?></td>
                <td><?php echo $res_res[$a]["nilai"] ?></td>
                <td><textarea class="form-control" rows="7"><?php echo base64_decode($res_res[$a]["answear"]) ?></textarea></td>
                <td><?php echo base64_decode($res_res[$a]["log_err1"]) ?></td>
                <td><?php echo base64_decode($res_res[$a]["log_err2"]) ?></td>
                <td><?php echo base64_decode($res_res[$a]["log_err3"]) ?></td>
                <td>

                    <button class="btn btn-success" data-toggle = "modal" data-target="#staticBackdrop<?php echo $res_res[$a]['id'] ?>">Edit Nilai</button>
                    <button class="btn btn-danger" onclick="confirm_d()">Hapus</button>


                    <div class="modal fade" id="staticBackdrop<?php echo $res_res[$a]['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Nilai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="edit_del_result.php" method="POST">
                            <div class="modal-body">

                          <input type="hidden" name="id" value="<?php echo $res_res[$a]['id'] ?>">

                              <!-- iout token -->
                          <div class="form-group">
                           <label for="exampleFormControlInput1">Nilai Baru</label>
                           <input type="text" name="new_nilai" class="form-control" id="exampleFormControlInput1" value="<?php echo $res_res[$a]["nilai"] ?>">
                          </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>


                </td>
              </tr>
              <?php $i++; ?>
            <?php endfor; ?>

            </tbody>
          </table>

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