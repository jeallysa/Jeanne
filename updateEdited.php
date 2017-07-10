<?php 
  $year       = date('Y');
  $push    = $_POST['score'];
  $sit         = $_POST['situp'];  
  $run    = $_POST['run'];
  $quarter    = $_POST['quarter'];

  $conn = mysqli_connect('localhost', 'root', '', 'pft');
  $ps = mysqli_query($conn, "SELECT * from pft_info");
  $value = mysqli_fetch_array($ps);
  if (!$value && quarter == $quarter) {
    echo "maginsert ka";
  }else{
    echo "maguupdate sya";
  }

 ?>