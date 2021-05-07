<?php

include "db.php";


$word=$_POST["word"];
$language=$_POST["language"];
$polarity=$_POST["polarity"];


$sql = "INSERT INTO collection (word,language,polarity)VALUES ('$word', '$language', '$polarity')";
mysqli_query($conn, $sql);


$sql = "SELECT * FROM collection";
$numberOfWords=0;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   $numberOfWords+=1;
  }
}


$res=[];
$res["number"]=$numberOfWords;

echo  json_encode($res);

?> 