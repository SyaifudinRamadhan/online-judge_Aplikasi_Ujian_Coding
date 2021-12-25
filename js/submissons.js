var defaultUrl = localStorageGetItem("api-url") || "https://secure.judge0.com/standard";
var apiUrl = defaultUrl;
var wait = localStorageGetItem("wait") || false;
var pbUrl = "https://pb.judge0.com";
var check_timeout = 200;

var blinkStatusLine = ((localStorageGetItem("blink") || "true") === "true");
var editorMode = localStorageGetItem("editorMode") || "normal";
var redirectStderrToStdout = ((localStorageGetItem("redirectStderrToStdout") || "false") === "true");

var sourceEditor;
var stdinEditor;

var isEditorDirty = false;

var $selectLanguage;
var $compilerOptions;
var $commandLineArguments;

var timeStart;
var timeEnd;
var token1; var token2; var token3;
var s_token;
var token = new Array();
var sourceValue;



function localStorageSetItem(key, value) {
  try {
    localStorage.setItem(key, value);
  } catch (ignorable) {
  }
}

function localStorageGetItem(key) {
  try {
    return localStorage.getItem(key);
  } catch (ignorable) {
    return null;
  }
}


function handleError(jqXHR, textStatus, errorThrown) {
    showError(`${jqXHR.statusText} (${jqXHR.status})`, `<pre>${JSON.stringify(jqXHR, null, 4)}</pre>`);
}

function handleRunError(jqXHR, textStatus, errorThrown) {
    handleError(jqXHR, textStatus, errorThrown);
}

function submit(data_std_in, index) {
     
     // document.getElementById("myText").innerHTML = data_std_in;
  
     sourceValue = encode(sourceEditor.getValue());
    var stdinValue = data_std_in;
    // var stdinValue = encode(stdinEditor.getValue());
    var languageId = resolveLanguageId($selectLanguage.val());
    var compilerOptions = $compilerOptions.val();
    var commandLineArguments = $commandLineArguments.val();


    if (parseInt(languageId) === 44) {
        sourceValue = sourceEditor.getValue();
    }

    var data = {
        source_code: sourceValue,
        language_id: languageId,
        stdin: stdinValue,
        compiler_options: compilerOptions,
        command_line_arguments: commandLineArguments,
        redirect_stderr_to_stdout: redirectStderrToStdout
    };


    var sendRequest = function(data) {
        timeStart = performance.now();
        $.ajax({
            url: `https://judge0.p.rapidapi.com/submissions?base64_encoded=true&wait=${wait}`,
            type: "POST",
            async: true,
            headers:{
                "x-rapidapi-host": "judge0.p.rapidapi.com",
                "x-rapidapi-key": "fa4dcc5e85mshd03a67fefbfe166p1ef474jsnd47d695027ff",
                "content-type": "application/json",
                "accept": "application/json"
            },
            data: JSON.stringify(data),
            xhrFields: {
                withCredentials: apiUrl.indexOf("/secure") != -1 ? true : false
            },
            success: function (data, textStatus, jqXHR) {
                // console.log(`Your submission token is: ${data.token}`);
                // document.getElementById("myText").innerHTML =  `Your submission token is: ${data.token}`;
                // window.location.href="core2.php?token="+ `${data.token}`;
                s_token = `${data.token}`;
                token[index]=s_token;
                // document.getElementById("myText").innerHTML =  s_token;
            },
            error: handleRunError
        });
    }

  sendRequest(data);
  return s_token;
}

function query(){

    var ajax = new XMLHttpRequest;
    var method = "GET";
    var url = "config/db_connect.php";
    var asynchronous = true;

    //in to ajax
    ajax.open(method, url, asynchronous);
    //ajax sending request
    ajax.send();

    //receiving data json from db_connect
    ajax.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

           // convert json back to array
           document.getElementById("loader").style.display = "block";
           document.getElementById("site-content").style.display = "none";
           document.getElementById("slider").style.display = "block";
            var data = JSON.parse(this.responseText);
            console.log(data);
            // document.getElementById("myText").innerHTML = decode(data[0].stdin);
            var stdVal_in = data[0].stdin;
            var stdVal_in1 = data[1].stdin;
            var stdVal_in2 = data[2].stdin;
            // alert(this.responseText);
            submit(stdVal_in, 0);
            submit(stdVal_in1, 1);
            submit(stdVal_in2, 2);

            //  document.getElementById("myText").innerHTML = "token1 = "+token[0]+" token2 = "+token[1]+" token3 = "
            // +token[2]+"stdin1="+decode(stdVal_in)+"stdin2="+decode(stdVal_in1)+"stdin3="+decode(stdVal_in2);

              setTimeout(function()
            {  document.location.href = "core2.php?token1="+token[0]+"&token2="+token[1]+"&token3="+token[2]+"&sc="+sourceValue;
            // document.getElementById("myText").innerHTML = "token1 = "+token[0]+" token2 = "+token[1]+" token3 = "
            // +token[2]+"stdin1="+decode(stdVal_in)+"stdin2="+decode(stdVal_in1)+"stdin3="+decode(stdVal_in2);
            },12000);
        
           // if(cek_token == ""){
           //      cek_token = submit(stdVal_in);
           //      document.getElementById("myText").innerHTML = cek_token;
           // }
           // document.getElementById("myText").innerHTML = "token1 = "+token_id[0]+" token2 = "+token_id[1]+" token3 = "+token_id[2];
        }


        // setTimeout(function()
        //     {submit(stdVal_in1,1);},4000);
        //  setTimeout(function()
        //     {submit(stdVal_in2,2);},8000);
        //   setTimeout(function()
        //     {  document.location.href = "core2.php?token1="+token[0]+"&token2="+token[1]+"&token3="+token[2];
        //     // document.getElementById("myText").innerHTML = "token1 = "+token[0]+" token2 = "+token[1]+" token3 = "
        //     // +token[2]+"stdin1="+decode(stdVal_in)+"stdin2="+decode(stdVal_in1)+"stdin3="+decode(stdVal_in2);
        //     },12000);
          // setTimeout(function()
          //   {var token4 = s_token;
          //     
          
    
    }  
}

function cek(){
    var konfirmasi = confirm("Apakah anda yakin ingin mensubmitnya ?");
        
        if(konfirmasi == true){
           query();
        }
}

function logout(){

  var logout = confirm("Yakin igin LOGOUT ?");
  if(logout == true){
    document.location.href = "logout.php";
  }
}
