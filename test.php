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

  $_SESSION["token"] = $_POST["token"];

        $nim = $_SESSION["login"];
        $id_soal = $_SESSION["token"];

        $query1 = "SELECT * FROM client WHERE nim='$nim'";
        $res = mysqli_query($connect, $query1);
        $data_client = mysqli_fetch_assoc($res);
        $id_admin = $data_client["id_admin"];

        $query_res = "SELECT * FROM result_test WHERE nim='$nim' AND token='$id_soal'";
        $query_test_soal = "SELECT * FROM soal WHERE id_soal='$id_soal' AND id_admin='$id_admin'";

        $res = mysqli_query($connect, $query_res);
        $cek_soal = mysqli_query($connect, $query_test_soal);


        if(mysqli_num_rows($res) >= 1){

            echo "
            <script>
            alert('Anda sudah pernah menjawab soal ini');
            document.location.href='dashboard.php';
            </script>
            ";

        }else if(mysqli_num_rows($cek_soal) == 0){

            echo "
            <script>
            alert('Soal tidak tersedia');
            document.location.href='dashboard.php';
            </script>
            ";
        }

//query pertanyaan dari db
        else{

             query_question($_POST["token"]);

              //create result test null data
              add_users_result($data_client["nama"], $_SESSION["token"], $_SESSION["login"], 0, "", "", "", "",$data_client["id_admin"]);
            
         }

}



//akhir tag php
 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/goldenlayout.min.js" integrity="sha256-NhJAZDfGgv4PiB+GVlSrPdh3uc75XXYSM4su8hgTchI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-base.css" integrity="sha256-oIDR18yKFZtfjCJfDsJYpTBv1S9QmxYopeqw2dO96xM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-dark-theme.css" integrity="sha256-ygw8PvSDJJUGLf6Q9KIQsYR3mOmiQNlDaxMLDOx9xL0=" crossorigin="anonymous" />

    <script>
        var require = {
            paths: {
                "vs": "https://unpkg.com/monaco-editor/min/vs",
                "monaco-vim": "https://unpkg.com/monaco-vim/dist/monaco-vim",
                "monaco-emacs": "https://unpkg.com/monaco-emacs/dist/monaco-emacs"
            }
        };
    </script>
    <script src="https://unpkg.com/monaco-editor/min/vs/loader.js"></script>
    <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.nls.js"></script>
    <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

    <script type="text/javascript" src="third_party/download.js"></script>

    <script type="text/javascript" src="js/ide.js"></script>

    <script type="text/javascript" src="js/submissons.js"></script>

    <link type="text/css" rel="stylesheet" href="css/ide.css">

    <link type="text/css" rel="stylesheet" href="css/loader.css">

    <title>JOnline IDE & Compiler</title>
   <!--  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"> -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-83802640-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-83802640-2');
    </script>

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="ee4621ff-c682-44ac-8cfa-1835beddb98a";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
    <link type="text/css" rel="stylesheet"  href="css/style.css">
</head>

<body >

    <div id="site-navigation" class="ui small inverted menu">
        <div id="site-header" class="header item">
            <a href="#">
                <img id="site-icon" src="./images/judge0_icon.png">
                <h2>ASR0 IDE</h2>
            </a>
        </div>
        <div class="left menu">
            <!-- <div class="ui dropdown item site-links on-hover">
                File <i class="dropdown icon"></i> -->
               <!--  <div class="menu"> -->
                    <!-- <a class="item" target="_blank" href="/"><i class="file code icon"></i> New File</a>
                    <div class="item" onclick="save()"><i class="save icon"></i> Save (Ctrl + S)</div>
                    <div class="item" onclick="downloadSource()"><i class="download icon"></i> Download</div>
                    <div class="item"><i class="share icon"></i> Share</div>
                    <div id="insert-template-btn" class="item"><i class="file code outline icon"></i> Insert template
                        for current language</div> -->
                <!-- </div> -->
           <!--  </div> -->
         <!--    <div class="link item" onclick="$('#site-settings').modal('show')"><i class="cog icon"></i> Settings</div> -->
            <div class="item borderless">
                <select id="select-language" class="ui dropdown">

                    <option value="75" mode="c">C (Clang 7.0.1)</option>
                   
                    <option value="48" mode="c">C (GCC 7.4.0)</option>
                    <option value="49" mode="c">C (GCC 8.3.0)</option>
                    <option value="50" mode="c">C (GCC 9.2.0)</option>
                    <option value="51" mode="csharp">C# (Mono 6.6.0.161)</option>
                    <option value="76" mode="cpp">C++ (Clang 7.0.1)</option>
                   
                    <option value="52" mode="cpp">C++ (GCC 7.4.0)</option>
                    <option value="53" mode="cpp">C++ (GCC 8.3.0)</option>
                    <option value="54" mode="cpp">C++ (GCC 9.2.0)</option>
                  

                    <option value="87" mode="fsharp">F# (.NET Core SDK 3.1.202)</option>
                   
                    <option value="61" mode="UNKNOWN">Haskell (GHC 8.8.1)</option> <!-- Unknown mode. Help needed. -->
                    <option value="62" mode="java">Java (OpenJDK 13.0.1)</option>
                    <option value="1004" mode="java">Java (OpenJDK 14.0.1)</option>
                    <option value="1005" mode="java">Java Test (OpenJDK 14.0.1, JUnit Platform Console Standalone 1.6.2)</option>
                    <option value="63" mode="javascript">JavaScript (Node.js 12.14.0)</option>
                    <option value="78" mode="kotlin">Kotlin (1.3.70)</option>
                    <option value="64" mode="lua">Lua (5.3.5)</option>
        
                    <option value="67" mode="pascal">Pascal (FPC 3.0.4)</option>
                    <option value="85" mode="perl">Perl (5.28.1)</option>
                    <option value="68" mode="php">PHP (7.4.1)</option>
                   
                    <option value="70" mode="python">Python (2.7.17)</option>
                    <option value="71" mode="python">Python (3.8.1)</option>
                    <option value="1010" mode="python">Python for ML (3.7.3)</option>
                    <option value="80" mode="r">R (4.0.0)</option>
                    <option value="72" mode="ruby">Ruby (2.7.0)</option>
                  
                    <option value="84" mode="vb">Visual Basic.Net</option> <!-- (vbnc 0.0.0.5943) -->
                </select>
            </div>
           <!--  <div class="item fitted borderless wide screen only">
                <div class="ui input">
                    <input id="compiler-options" type="text" placeholder="Compiler options"></input>
                </div>
            </div> -->
            <div class="item borderless wide screen only">
                <div class="ui input">
                    <input id="command-line-arguments" type="text" placeholder="Command line arguments"></input>
                </div>
            </div>
            <div class="item no-left-padding borderless">
                <button id="run-btn" class="ui primary labeled icon button" ><i class="play icon"></i>Run (F9)</button>
            </div>
             <div class="item no-left-padding borderless">
                <button  class="ui primary labeled icon button" onclick="cek()">SUBMIT</button>
            </div>

            <div id="navigation-message" class="item borderless">
               <!--  <span class="navigation-message-text"></span> -->
            </div>
        </div>
        <div class="right menu">
           
            
           
        </div>
    </div>
    <div style="height: 100%; width: 25%;  display: relative">
        <div class="petunjuk"><br><br>&nbsp&nbsp&nbsp&nbsp&nbspAturan Penggunaan
            <div class="p_content">
                <div class="content1" id="myText" >
                   Aplikasi ini menyediakan tempat <br>
                   untuk melakukan pengujian program <br>
                   sebelum anda mensubmitnya. Adapun <br>
                   aturannya :<br>
                   1. Sebelum anda mengirim jawaban anda bisa 
                    melakukan uji coba program dengan tombol
                    run dan untuk input gunakan form stdin <br>
                    2. Hasil/ output program bisa dilihat
                     pada kolom stdout, stderr & compile output <br>
                    3. Untuk bahasa pemrograman bisa dipilih di
                     dropdown select di header (gunakan sesuai instruksi) <br>
                    4. Untuk mengirim jawaban gunakan tombol
                     submit. Jawaban akan terkirim selama 12 detik <br>
                    5.  Saat mengiirim jawaban mohon tunggu dan
                     jangan di reload. Karena bisa gagal <br>
                    6. Jawaban hanya bisa dikirim satu kali
                </div>
            </div>
        </div>
         <div class="petunjuk1"><br><br>&nbsp&nbsp&nbsp&nbsp&nbspPermasalahan
            <div class="p_content1">
                <div class="content2" style="overflow-x: hidden;">
                    <br><br><br>
                    <?php echo $question_query[0]["question"]; ?>
                </div>
            </div>
        </div>
        <div class="petunjuk2"><br>&nbsp&nbsp&nbsp&nbsp&nbspContoh Input
            <div class="p_content2">
                <textarea disabled style="background-color:#fbfbe5; resize:none" class="content3"><?php echo $question_query[0]["example_input"]; ?></textarea>
            </div>
            <div class="title">
                &nbsp&nbsp&nbsp&nbsp&nbspContoh Output
            </div>
            <div class="p_content3">
                <textarea disabled style="background-color:#fbfbe5; resize:none" class="content4"><?php echo $question_query[0]["example_output"]; ?></textarea>
            </div>
        </div>
    </div>

    <div id="loader" style="display: none;"></div>

    <div id="slider" style="text-align: center; display: none; width: 100%; height: 220%; background-color: #fff; position: fixed; opacity: 50%; margin-top: -1000px; font-size: 25pt; font-weight: bold;"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>Mohon Tunggu</div>

    <div id="site-content" ></div>
   
    <div id="site-footer">
    
        <div id="editor-status-line"></div>
        <span>© 2020 IDE Online for live coding. Powered by https://ide.judge0.com
        <span id="status-line"></span>
  

</html>
