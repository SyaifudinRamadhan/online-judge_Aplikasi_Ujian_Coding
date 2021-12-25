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




	// if (isset($_POST["submit"])) {
	// 	$std = base64_encode($_POST["std"]);
	// 	$id_soal = $_POST["id_soal"];
	// 	$stdout = base64_encode($_POST["stdout"]);
	// 	echo $std;

	// 	$edit_del_soal=add_question($id_soal,  $std, $stdout);

	// 	if($edit_del_soal < 0){
	// 		echo "
	// 		<script>
	// 			alert('Soal gagal ditambahkan');
	// 		</script>";
	// 	}

	// 	else{
	// 		echo "
	// 		<script>
	// 			alert('Soal berhasil ditambahkan');
	// 		</script>";
	// 	}


	// }

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
      <div class="col-md-2 bg-dark pt-3 " style="padding-bottom: 26% !important;">
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
        <h3 class="m-5"><i class="fas fa-edit mr-3"></i>Kelola Soal<hr class="bg-secondary"></hr></h3>

        <div class="row ml-5 text-white">
          
           <div class="card mr-5">
            <div class="card-header bg-success">
              Petunjuk
            </div>
           <div class="card-body text-dark">
                <h5 class="card-title">Halaman Kelola dan Membuat Soal</h5>
                <p class="card-text">
                	1. Pembuatan soal harus disertakan dengan token / kode soal. satu token yang anda buat merupakan satu kesatuan soal. (1 token = 1 soal) <br>
                	2. Satu kesatuan soal terdiri dari 3 sub soal. Yang artinya dalam satu soal terdapat tiga sub soal atau bisa disebut dengan test case untuk jawaban program yang dikirimkan peserta <br>
                	3. Perlu diketahui soal yang tampil di tabel ini akan terikutsertakan dengan sub soal dari masing masing token. Jadi artinya selama ada beberapa soal dengan token yang sama maka artinya 3 soal tersebut merupakan satu kesatuan soal. <br>
                	4. Dalam satu kesatuan soal hanya akan ada satu pertanyan, contoh input, dan contoh output pada salah satu sub soal / test case. <br>
                	5. Untuk menghapus maupun mengedit soal cukup klik salah satu tombol dari salah satu sub soal selama tokennya sama / satu kesatuan. <br>
                	6. Menghapus / mengedit satu sub soal akan sama dengan tindakan menghapus / mengedit satu kesatuan soal.
                </p>
              </div>
            </div>

        </div>

        <div class="row ml-5 mt-5">
        	
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
			  + Tambah Soal
			</button>

			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel">Tambah Soal</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <form role="form" action="edit_del_soal.php" method="post">
			      	<div class="modal-body">
                <input type="hidden" name="id_admin" value="<?php echo $id_admin ?>">
			      		<!-- iout token -->
			      <div class="form-group">
						 <label for="exampleFormControlInput1">Token / ID Soal</label>
						 <input type="text" name="token_soal" class="form-control" required="" id="exampleFormControlInput1">
					  </div>
					  <!-- input question -->
				      <div class="form-group">
					    <label for="exampleFormControlTextarea1">Pertanyaan / Persoalan</label>
					    <textarea class="form-control" name="soal" required="" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					  <!-- Contoh Input -->
					  <div class="form-group">
						 <label for="exampleFormControlInput2">Contoh Input</label>
						<textarea class="form-control" name="ex_input" required="" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					  <!-- contoh output -->
					  <div class="form-group">
						 <label for="exampleFormControlInput3">Contoh Output</label>
						 
             <textarea class="form-control" name="ex_output" required="" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					  <!-- Input stdin -->
					  <div class="form-group">
					    <label for="exampleFormControlTextarea2">Input For Test Case 1</label>
					    <textarea class="form-control" name="stdin1" required="" id="exampleFormControlTextarea2" rows="3"></textarea>
					  </div>
					   <div class="form-group">
					    <label for="exampleFormControlTextarea3">Input For Test Case 2</label>
					    <textarea class="form-control" name="stdin2" required="" id="exampleFormControlTextarea3" rows="3"></textarea>
					  </div>
					   <div class="form-group">
					    <label for="exampleFormControlTextarea4">Input For Test Case 3</label>
					    <textarea class="form-control" name="stdin3" required="" id="exampleFormControlTextarea4" rows="3"></textarea>
					  </div>
					  <!-- Output stdout -->
					  <div class="form-group">
					    <label for="exampleFormControlTextarea5">Output For Test Case 1</label>
					    <textarea class="form-control" name="stdout1" required="" id="exampleFormControlTextarea5" rows="3"></textarea>
					  </div>
					   <div class="form-group">
					    <label for="exampleFormControlTextarea6">Output For Test Case 2</label>
					    <textarea class="form-control" name="stdout2" required="" id="exampleFormControlTextarea7" rows="3"></textarea>
					  </div>
					   <div class="form-group">
					    <label for="exampleFormControlTextarea7">Output For Test Case 3</label>
					    <textarea class="form-control" name="stdout3" required="" id="exampleFormControlTextarea7" rows="3"></textarea>
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

        <div class="row ml-5 mt-5 text-white" style="margin-bottom: 200px">
          
          <table class="table table-striped " style="width: 1200px">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Token / ID Soal</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Contoh input</th>
                <th scope="col">Contoh output</th>
                <th scope="col">Input</th>
                <th scope="col">Output</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php $i=1 ?>
             <?php for ($a=0; $a <sizeof($res_soal) ; $a+=3) { ?>
              <tr>
                <script type="text/javascript">
                  function confirm_d(){
                    var konfirm = confirm("Yakin ingin menghapusnya ?");
                    if(konfirm == true){
                       document.location.href = "edit_del_soal.php?delete=<?php echo $res_soal[$a]["id_soal"] ?>&id=<?php echo $res_soal[$a]["id_admin"] ?>";
                    }
                  }
                </script>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $res_soal[$a]["id_soal"] ?></td>
                <td><?php echo $res_soal[$a]["question"] ?></td>
                <td><?php echo $res_soal[$a]["example_input"] ?></td>
                <td><?php echo $res_soal[$a]["example_output"] ?></td>
                <td>
                  case in 1 : <?php echo base64_decode($res_soal[$a]["stdin"]) ?><br>
                  case in 2 : <?php echo base64_decode($res_soal[$a+1]["stdin"]) ?><br>
                  case in 3 : <?php echo base64_decode($res_soal[$a+2]["stdin"]) ?><br>
                    
                </td>
                <td>
                    case in 1 : <?php echo base64_decode($res_soal[$a]["stdout"]) ?><br>
                    case in 2 : <?php echo base64_decode($res_soal[$a+1]["stdout"]) ?><br>
                    case in 3 : <?php echo base64_decode($res_soal[$a+2]["stdout"]) ?><br>

                </td>
                <td><button class="btn btn-success mr-1" data-toggle = "modal" data-target="#staticBackdrop<?php echo $res_soal[$a]["id"] ?>">Edit</button>
                  <button class="btn btn-danger mr-1" onclick="confirm_d()">Hapus</button>
                 <!-- modal untuk edit -->
                  <div class="modal fade" id="staticBackdrop<?php echo $res_soal[$a]["id"] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Edit Soal</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="edit_del_soal.php" method="POST">

                         

                        <div class="modal-body">

                          <input type="hidden" name="key" value="<?php echo $res_soal[$a]["id"] ?>">

                          <input type="hidden" name="id_admin" value="<?php echo $res_soal[$a]["id_admin"] ?>">
                            <!-- iout token -->
                        <div class="form-group">
                         <label for="exampleFormControlInput1">Token / ID Soal</label>
                         <input type="text" name="token_soal" class="form-control" id="exampleFormControlInput1" value="<?php echo $res_soal[$a]["id_soal"] ?>">
                        </div>
                        <!-- input question -->
                          <div class="form-group">
                          <label for="exampleFormControlTextarea1">Pertanyaan / Persoalan</label>
                          <textarea class="form-control" name="soal" id="exampleFormControlTextarea1" rows="3"><?php echo $res_soal[$a]["question"] ?></textarea>
                        </div>
                        <!-- Contoh Input -->
                        <div class="form-group">
                         <label for="exampleFormControlInput2">Contoh Input</label>
                        
                         <textarea class="form-control" name="ex_input" id="exampleFormControlTextarea1" rows="3"><?php echo $res_soal[$a]["example_input"] ?></textarea>
                        </div>
                        <!-- contoh output -->
                        <div class="form-group">
                         <label for="exampleFormControlInput3">Contoh Output</label>
                      
                         <textarea class="form-control" name="ex_output" id="exampleFormControlTextarea1" rows="3"><?php echo $res_soal[$a]["example_output"] ?></textarea>
                        </div>
                        <!-- Input stdin -->
                        <div class="form-group">
                          <label for="exampleFormControlTextarea2">Input For Test Case 1</label>
                          <textarea class="form-control" name="stdin1" id="exampleFormControlTextarea2" rows="3" ><?php echo base64_decode($res_soal[$a]["stdin"]) ?></textarea>
                        </div>
                         <div class="form-group">
                          <label for="exampleFormControlTextarea3">Input For Test Case 2</label>
                          <textarea class="form-control" name="stdin2" id="exampleFormControlTextarea3" rows="3" ><?php echo base64_decode($res_soal[$a+1]["stdin"]) ?></textarea>
                        </div>
                         <div class="form-group">
                          <label for="exampleFormControlTextarea4">Input For Test Case 3</label>
                          <textarea class="form-control" name="stdin3" id="exampleFormControlTextarea4" rows="3" ><?php echo base64_decode($res_soal[$a+2]["stdin"]) ?></textarea>
                        </div>
                        <!-- Output stdout -->
                        <div class="form-group">
                          <label for="exampleFormControlTextarea5">Output For Test Case 1</label>
                          <textarea class="form-control" name="stdout1" id="exampleFormControlTextarea5" rows="3"><?php echo base64_decode($res_soal[$a]["stdout"]) ?></textarea>
                        </div>
                         <div class="form-group">
                          <label for="exampleFormControlTextarea6">Output For Test Case 2</label>
                          <textarea class="form-control" name="stdout2" id="exampleFormControlTextarea7" rows="3"><?php echo base64_decode($res_soal[$a+1]["stdout"]) ?></textarea>
                        </div>
                         <div class="form-group">
                          <label for="exampleFormControlTextarea7">Output For Test Case 3</label>
                          <textarea class="form-control" name="stdout3" id="exampleFormControlTextarea7" rows="3"><?php echo base64_decode($res_soal[$a+2]["stdout"]) ?></textarea>
                        </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>

                        <!-- php close php query form -->

                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- akhir tag modal edit -->
                </td>
              </tr>
             <?php $i++;} ?>

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