<?php include('header.php'); ?>


<div class="container">

<?php
  if(isset($_POST['add_info'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_SESSION['phone_admin'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $gender = $_POST['gender'];
    $bloodgroup = $_POST['bloodgroup'];
    $bank_id = $_POST['bank_id'];
    $date = date('Y-m-d');
    $checkstate = false;
    $AddReservation = mysqli_query($db, "INSERT INTO `reservation`(`fname`, `lname`, `phone`, `age`, `location`, `type`, `gender`, `bloodgroup`, `bank_id`, `date`)
     VALUES ('$fname','$lname','$phone','$age','$location','$type','$gender','$bloodgroup','$bank_id','$date')");
    if($AddReservation){
      echo "<div class='alert alert-success'>زیادكرا بەسەركەوتوی</div>";
      header("Location:index.php");
    }else{
      echo "<div class='alert alert-danger'> ببوورە کێشەیەک هەیە  دووبارە تاقی بکەوە</div>";      
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
          <label>تەمەنی تۆ <small class="c-red">*</small></label>
          <input type="number" name="age" class="form-control" required>
        </div>
        <div class="col-6 col-md-6">
          <label>شوێن <small class="c-red">*</small></label>
          <input type="text" name="location" class="form-control" required>
        </div>


        <div class="col-6 col-md-6">
          <label>جۆری تۆ <small class="c-red">*</small></label>
          <select name="type" class="form-control" required>
            <option value="0">وەرگری خوێن</option>
            <option value="1">بەخشینی خوێن</option>
          </select>
        </div>

        <div class="col-6 col-md-6">
          <label>ڕەگەز <small class="c-red">*</small></label>
          <select name="gender" class="form-control" required>
            <option value="1">نێر</option>
            <option value="0">مێ</option>
          </select>
        </div>
        <div class="col-6 col-md-6">
          <label>گروپی خوێن<small class="c-red">*</small></label>
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
          <label>بانكی خوێن <small class="c-red">*</small></label>
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


       
        <div class="col-6 col-md-6">
          <br>
          <button name="add_info" class="btn btn-success btn-block">زیادكردنی زانیاریەكانم</button>
        </div>

      </form>
    </div>
    <div class="col-md-4 text-center"><br>
      <h3>دەتوانیت یەک لیتر لە خوێنت ببەخشیت و ژیانی كەسێك ڕزگار بكەیت</h3>
      <br>
      <img src="../jpg/3.jpg" width="100%">
    </div>
  </div>
</div>




<?php
  include('footer.php');
?>