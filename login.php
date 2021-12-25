<?php 
session_start();

require 'config/config.php';

if (isset($_POST["submit"])) {

  $username = $_POST["nim"];
  $password = $_POST["password"];

  $query1 = "SELECT * FROM client WHERE nim='$username'";
  $query2 = "SELECT * FROM user WHERE email='$username'";
  $query3 = "SELECT * FROM super_admin WHERE email='$username'";

  $check1 = mysqli_query($connect, $query1);
  $res1 = mysqli_num_rows($check1);

  $check_admin = mysqli_query($connect, $query2);
  $res_admin = mysqli_num_rows($check_admin);

  $check_s_admin = mysqli_query($connect, $query3);
  $res_s_admin = mysqli_num_rows($check_s_admin);

  if($res1 == 1){

    $data = mysqli_fetch_assoc($check1);

    $pass = $data["password"];

    if (strcmp($password, $pass) === 0) {
      $_SESSION["login"] = $username;
      echo "
      <script>
      alert('Anda berhasil Login sebagai peserta test :)');
      document.location.href='dashboard.php';
      </script>
      ";
    }else{
      echo "
      <script>
      alert('Password tidak sesuai :(');
      document.location.href='login.php';
      </script>
      ";
    }

  }else if($res_admin == 1){

    $data = mysqli_fetch_assoc($check_admin);

    $pass = $data["password"];

    if(strcmp($password, $pass) === 0){
      $_SESSION["admin"] = $username;
      $_SESSION["id_admin"] = $data["id"];
      
      echo "
      <script>
      alert('Anda berhasil Login sebagai Administrator :)');
      document.location.href='administrator.php';
      </script>
      ";
    }else{
      echo "
      <script>
      alert('Password tidak sesuai :(');
      document.location.href='login.php';
      </script>
      ";
    }
  }else if($res_s_admin == 1){

    $data = mysqli_fetch_assoc($check_s_admin);

    $pass = $data["password"];

    if(strcmp($password, $pass) == 0){
      $_SESSION["s_admin"] = $data["nama"];
      $_SESSION["id_s_admin"] = $data["id"];

      echo "
      <script>
      alert('Anda berhasil Login sebagai super Administrator :)');
      document.location.href='administrator.php';
      </script>
      ";
    } else{
      echo "
      <script>
      alert('Password tidak sesuai :(');
      document.location.href='login.php';
      </script>
      ";
    }

  }else{
    echo "
      <script>
      alert('Username tidak tersedia :(');
      document.location.href='login.php';
      </script>
      ";
  }

//end tag of if $_POST submit
}



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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>Online Judge IDE Software</title>
  </head>
  <body>
    <div class="container mt-5 mb-5 pt-5 bg-primary rounded" style="max-width: 500px; height: 500px; border-color: #000">

      <h1 style="text-align: center" class="text-white">LOGIN FIRST !!!</h1>
      
     <div class="container bg-white rounded" style="height: 340px">
       
       <form action="" method="POST" class="mt-5 pt-5">
        <div class="form-group">
          <label for="exampleInputEmail1">NIM / E-Mail (Admin)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nim" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
        </div>
        <hr class="bg-white"></hr>

        <button type="submit" name="submit" class="btn btn-success ml-auto">Submit</button>
       
      </form>
       <button class="btn btn-primary mt-3" data-toggle = "modal" data-target="#staticBackdrop">Sign Up As Admin</button>

                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="add_admin.php" method="POST">

                        <div class="modal-body">
                            <!-- iout token -->
                        <div class="form-group">
                         <label for="exampleFormControlInput1">Nama</label>
                         <input type="text" name="nama" class="form-control" required="" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                         <label for="exampleFormControlInput1">NIM</label>
                         <input type="text" name="nim" class="form-control" required="" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                         <label for="exampleFormControlInput1">E-Mail</label>
                         <input type="text" name="email" class="form-control" required="" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                         <label for="exampleFormControlInput1">Password</label>
                         <input type="text" name="password" class="form-control" required="" id="exampleFormControlInput1">
                        </div>
                        <!-- input question -->

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                        </div>

                        <!-- php close php query form -->

                        </form>
                      </div>
                    </div>
                  </div>

     </div>

      <!-- div close container -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
  </body>
</html>