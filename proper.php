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
  font-size: 0.1%;
}
</style>
<?php

echo "Downloading Video: ".$_GET['url'];
echo "<br> Quailty: ";
echo $_GET['Format'];
echo "<div class='debug'><br><br>DEBUG:<br>";
$URL = $_GET['url'];
$fi = new FilesystemIterator('videos', FilesystemIterator::SKIP_DOTS);
printf("<br>There were %d Files", iterator_count($fi));

$command = "/usr/bin/python3.6 2.py $URL";
//$command = 'whoami';
exec($command, $out, $status);
print_r($out);
echo "....".$status;
echo "<br>end DEBUG<br><br></div>";
$fi = new FilesystemIterator('videos', FilesystemIterator::SKIP_DOTS);
//printf("<br>There now are %d Files", iterator_count($fi));

//latest fiel:
//get the lastest file uploaded in excel_uploads/
$path = "videos";
$latest_ctime = 0;
$latest_filename = "";
$d = dir($path);
while (false !== ($entry = $d->read())) {
$filepath = "{$path}/{$entry}";
//Check whether the entry is a file etc.:
    if(is_file($filepath) && filectime($filepath) > $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $latest_filename = $entry;
    }//end if is file etc.
}//end while going over files in excel_uploads dir.

//earliest files
//get the lastest file uploaded in excel_uploads/
$path = "videos";
$latest_ctime = INF;
$early_filename = "";
$d = dir($path);
while (false !== ($entry = $d->read())) {
$filepath = "{$path}/{$entry}";
//Check whether the entry is a file etc.:
    if(is_file($filepath) && filectime($filepath) < $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $early_filename = $entry;
    }//end if is file etc.
}//end while going over files in excel_uploads dir.
$delFile = 'videos/'.$early_filename;
if ($early_filename != $latest_filename) {unlink($delFile);}

?>
<h1> Conversion Finished for <?PHP echo $latest_filename; ?> </h1>
<?PHP
echo "<a href='videos/$latest_filename' download> Download $latest_filename </a><br>";
 ?>
 <?PHP
 echo "<a href='videos/$latest_filename'> Watch Online: $latest_filename </a><br>$delFile";
  ?>
<br>
  <a href='index.html'> Convert another video </a>
