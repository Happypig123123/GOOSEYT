<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<title>Goose Tube</title>
</head>
<style>
#myProgress {
  width: 90%;
  background-color: #1fa5ed;
  margin: 5%;
  border-style: solid;
  border-color: black;
  border-radius: 10px;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #792c8c;
  border-color: #1fa5ed;
  border-radius: 10px;
  border-style: solid;

}
body {

    font-family: 'Ubuntu', sans-serif;
    font-size: 150%;
    background-image: url("bg.png");
    color:white;

}
.debug {
  visibility: hidden;
}
</style>
<?php

echo "Downloading Video: ".$_GET['url'];
echo "<br> Quailty: ";
echo $_GET['Format'];
$URL = $_GET['url'];
$FORM = $_GET['Format'];
header("Refresh: 2; url=proper.php?url=$URL&Format=$FORM");

 ?>
<h1> Convertion in progress, go browse some <span style='color:maroon'>reddit</span> while you wait. </h1>
<h3> BTW... this progress bar isn't accurate at all </h3>
<div id="myProgress">
  <div id="myBar"></div>
</div>
<script>
move();
function move() {
  var elem = document.getElementById("myBar");
  var width = 1;
  var id = setInterval(frame, 1);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width = width + 0.003;
      elem.style.width = width + '%';
    }
  }
}

</script>
