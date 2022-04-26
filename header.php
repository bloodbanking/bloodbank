<?php
  session_start();
  $db = mysqli_connect("localhost","root","","bloodbank");
  function varible($data){
    $data = htmlspecialchars(strip_tags(stripcslashes($data)));
    return $data ;
  }
  if(isset($_SESSION['phone_admin']) && $_SESSION['phone_admin'] != ""){
    $phone = varible($_SESSION['phone_admin']);
    $user_login_query=mysqli_query($db, "SELECT * FROM `user` where phone='$phone' ");
    if($user_login_query){
          $user_login_fetch=mysqli_fetch_array($user_login_query);
              $_SESSION['name'] =$user_login_fetch['name'];
              $_SESSION['id'] =$user_login_fetch['id'];
              $_SESSION['permition'] =$user_login_fetch['permition'];
              header("Location:".$_SESSION['permition']."/index.php");
    }
  }



?>




<!DOCTYPE html>
<html>
<head>
  <title>سولی بڵۆد بانك</title>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">


  <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="./js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="./png/logo.png" width="80px;">
      سولی بڵۆد بانك
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
     aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">پەرەی سەرەكی</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="locations.php">بانكی خوێن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bloodtype.php">جۆرەكانی خوێن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="info.php">زانیاری</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="reservation.php">تۆماربوون</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="login.php">چونەژورەوە</a>
        </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
<div style="height:86px;"></div>