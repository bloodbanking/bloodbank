<?php include('header.php'); ?>









<?php
  if(isset($_POST['signin'])){
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if(empty($password) || empty($phone)){
      echo "<p class='alert alert-warning' style='z-index: 1;position: absolute;margin-top: 90px;'>
      ببوورە کێشەیەک هەیە  دووبارە تاقی بکەوە و چونەژورەوەكەت دوبارە بكەوە
      </p>";
    }else{
      $checkstate = false ;
      $checksignup_user_query = mysqli_query($db, "SELECT * FROM `user` where phone='$phone'");
      if($checksignup_user_query){
        
        while ($checksignup_user_fetch=mysqli_fetch_array($checksignup_user_query)) {
          if($checksignup_user_fetch['phone'] == $phone && $checksignup_user_fetch['password'] == $password ){
            $_SESSION['phone_admin'] = $phone;
            $_SESSION['id'] = $checksignup_user_fetch['id'];
            $_SESSION['permition'] = $checksignup_user_fetch['permition'];
            $checkstate = true;
            header("Location:index.php");
          }else{
            echo "Nothing";
          }
        }
      }else{
        echo "Not Excute";
      }
      if($checkstate == false){
        echo "<p class='alert alert-warning' style='z-index: 1;position: absolute;margin-top: 90px;'>
          please try again Sign In
        </p>";

      }
    }
  }
?>

  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-6"> <br>
        <div class="alert alert-info">
        چونەژورەوە
        </div>
        <form method="post" class="row justify-content-md-center" dir="ltr" lang="en">
          <div class="col-md-12">
            <label>ژمارەی تەلەفۆن</label>
            <input class="form-control" type="number" name="phone" placeholder="phone">
          </div>
          <div class="col-md-12"><br>
            <label>وشەی نهێنی</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="col-md-12"><br>
            <button type="submit" class="btn btn-success" name="signin">چونەژورەوە</button>        
          </div>



        </form>
        
      </div>
    </div>
  </div>




<?php include('footer.php'); ?>