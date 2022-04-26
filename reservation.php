<?php include('header.php'); ?>


<div class="container">

<?php
  if(isset($_POST['add_info'])){
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
    $fname = mysqli_real_escape_string($db,htmlspecialchars($_POST['fname']));
    
    $lname = mysqli_real_escape_string($db,htmlspecialchars($_POST['lname']));
    $phone = mysqli_real_escape_string($db, htmlspecialchars($_POST['phone']));
    $age = mysqli_real_escape_string($db,htmlspecialchars($_POST['age']));
    $location = mysqli_real_escape_string($db,htmlspecialchars($_POST['location']));
    $type = mysqli_real_escape_string($db, htmlspecialchars($_POST['type']));
    $gender = mysqli_real_escape_string($db,htmlspecialchars($_POST['gender']));
    $bloodgroup = mysqli_real_escape_string($db,htmlspecialchars($_POST['bloodgroup']));
    $bank_id = mysqli_real_escape_string($db,htmlspecialchars($_POST['bank_id']));
    $date = date('Y-m-d');
    $checkstate = false;


      $checksignin_user = mysqli_query($db,"SELECT * FROM `user` where phone='$phone'");
      if($checksignin_user){
        $checksignin_user_fetch = mysqli_fetch_array($checksignin_user);
          if($checksignin_user_fetch['phone'] == $phone && $checksignin_user_fetch['password'] == $password ){
            $checkstate = true;
          }
      }

      if($checkstate != true){
        $AddUser_query = mysqli_query($db,"INSERT INTO `user`(`name`, `phone`, `password`, `permition`) VALUES ('$fname','$phone','$password','user')");
        if($AddUser_query){

          $AddReservation = mysqli_query($db, "INSERT INTO `reservation`(`fname`, `lname`, `phone`, `age`, `location`, `type`, `gender`, `bloodgroup`, `bank_id`, `date`)
           VALUES ('$fname','$lname','$phone','$age','$location','$type','$gender','$bloodgroup','$bank_id','$date')");
          if($AddReservation){

            $checksignup_user = mysqli_query($db, "SELECT * FROM `user` where phone='$phone'");
            if($checksignup_user){
              $checksignup_user_fetch=mysqli_fetch_array($checksignup_user);
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


            echo "<div class='alert alert-success'> بە سەرکەوتوویی زیادکرا</div>";
          }else{
            echo "<div class='alert alert-danger'> Error : ببوورە کێشەیەک هەیە  دووبارە تاقی بکەوە</div>";      
          }

        }else{
        }
      }else{
        echo "<div class='alert alert-danger'>بەکارهێنەر هەیە تکایە لە جیاتی ئەوە لە  ئەژمێرەکەت بچۆ ژوورەوە</div>";      
      }









  }

?>


  <div class="row">
    <div class="col-md-8"><br>
      <form method="post" action="reservation.php" class="row">
        <div class="col-6 col-md-6">
          <label>ناوی یەكەم <small class="c-red">*</small></label>
          <input type="text" name="fname" class="form-control" required>
        </div>
        <div class="col-6 col-md-6">
          <label>ناوی دووەم <small class="c-red">*</small></label>
          <input type="text" name="lname" class="form-control" required>
        </div>
        <div class="col-6 col-md-6">
          <label>تەمەن <small class="c-red">*</small></label>
          <input type="number" name="age" class="form-control" required>
        </div>
        <div class="col-6 col-md-6">
          <label>شوێن <small class="c-red">*</small></label>
          <input type="text" name="location" class="form-control" required>
        </div>
        <div class="col-6 col-md-6">
          <label>ژمارەی مۆبایل <small class="c-red">*</small></label>
          <input type="number" name="phone" class="form-control" required>
        </div>
        <div class="col-6 col-md-6">
          <label>وشەی نهێنی <small class="c-red">*</small></label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <p class="lead-small">لەبیرت بێت كە ژمارەكەت ناوی بەكارهێنەرت دەبێت بۆ چونەژورەوە بۆ ئەژمێرەكەت و دەتوانیت وشەی نهێنیش بەكار بهێنیت </p>
        <div class="col-6 col-md-6">
          <label>دیاریكردن <small class="c-red">*</small></label>
          <select name="type" class="form-control" required>
            <option value="0">خوێن وەرگرتن</option>
            <option value="1">خوێن بەخشین</option>
          </select>
        </div>

        <div class="col-6 col-md-6">
          <label>ڕەگەز <small class="c-red">*</small></label>
          <select name="gender" class="form-control" required>
            <option value="1">نێر</option>
            <option value="0">مێ</option>
          </select>
        </div>
        <p class="lead-very small">ئەم دەست نیشان كردنە دەبێتە هۆی جیاكردنەوەی  ئەو كەسانەی دەیانەوێت خوێن ببەخشن یان خوێن وەربگرن</p>
        <div class="col-6 col-md-6">
          <label>گروپی خوێن <small class="c-red">*</small></label>
          <select name="bloodgroup" class="form-control" required>
            <?php
            $blood = mysqli_query($db, "SELECT * FROM `blood`");
            if($blood){
              while($blood_fetch=mysqli_fetch_array($blood)){
                echo "<option value='".$blood_fetch['blood_id']."'>".$blood_fetch['blood_name']."</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="col-6 col-md-6">
          <label> بانكی خوێن <small class="c-red">*</small></label>
          <select name="bank_id" class="form-control" required>
            <?php
            $bank = mysqli_query($db, "SELECT * FROM `bank`");
            if($bank){
              while($bank_fetch=mysqli_fetch_array($bank)){
                echo "<option value='".$bank_fetch['b_id']."'>".$bank_fetch['b_name']."</option>";
              }
            }
            ?>

          </select>
        </div>


        <div class="col-md-12">
          <label>تێبینی</label>
          <textarea name="note" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-6 col-md-6">
          <br>
          <button name="add_info" class="btn btn-success btn-block">ناردنی زانیاریەكانم</button>
        </div>

      </form>
    </div>
    <div class="col-md-4 text-center"><br>
      <h3>دەتوانیت یەک لیتر لە خوێنت ببەخشیت و ژیانی كەسێك ڕزگار بكەیت </h3>
      <br>
      <img src="jpg/3.jpg" style="border-radius: 10px;" width="100%">
    </div>
  </div>
</div>




<?php
  include('footer.php');
?>