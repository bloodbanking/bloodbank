<!DOCTYPE html>
<html>
<head>
  <title>بەكارهێنەرەكان</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<?php
session_start();
$db = mysqli_connect("localhost","root","","bloodbank");
function varible($data){
  $data = htmlspecialchars(strip_tags(stripcslashes($data)));
  return $data ;
}





if(isset($_SESSION['phone_admin']) && $_SESSION['phone_admin'] != "" && $_SESSION['permition'] == "user"){
  $phone = varible($_SESSION['phone_admin']);
  $select_user_login = mysqli_query($db,"SELECT * FROM `user` where phone='$phone' ");
  if($select_user_login){

  }else{
    // echo "hello";
    header("Location:../logout.php");
  }
}else{
  // echo "admin nia ";
  header("Location:../logout.php");
}

?>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">بەكارهێنەر</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">پەڕەی سەرەكی</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./reservation.php">تۆمارکردن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../logout.php">چونەدەرەوە</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-12">

