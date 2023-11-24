
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./alberto.js"></script>
  <title>Alberto</title>
  <style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  .input {
    padding: 10px 20px;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
    border-radius: 20px;
  }
</style>
</head>
<body>
  
</body>

<div class="row">
  <div class="col">
    <div style="width:900px;height: 700px;" id="reader"></div>
  </div><audio id="myAudio1">
  <source src="success.mp3" type="audio/ogg">
</audio>
<audio id="myAudio2">
  <source src="failed.mp3" type="audio/ogg">
</audio>
<script>
var x = document.getElementById("myAudio1");
var x2 = document.getElementById("myAudio2");      
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get.php?q=" + str, true);
    xmlhttp.send();
  }
}

function playAudio() { 
  x.play(); 
} 


  </script><br>
  <div class="col" style="padding: 20px;">
    <div><span>Result</span></div><form action="">
     <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="Result Here" readonly="" disabled/></form>
     <p><h2>Status: </h2><span id="txtHint"></span></p>
  </div>
</div>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    showHint(qrCodeMessage);
playAudio();

}
function onScanError(errorMessage) {
  //handle scan error
}
var AlbertFunctions = new AlbertFunctions(
    "reader", { fps: 10, qrbox: 250 });
AlbertFunctions.render(onScanSuccess, onScanError);

</script>
</html>
