<?php
  include('./header.php');
?>
<br>

<?php
$get_res_query=mysqli_query($db, "SELECT * FROM `reservation` WHERE phone='{$_SESSION['phone_admin']}'");
if($get_res_query){
if(mysqli_num_rows($get_res_query)>0){
  while($get_res_fetch=mysqli_fetch_array($get_res_query)){
    ?>
    <a href="details.php?id=<?= $get_res_fetch['r_id']?>">
    <table class="table table-striped table-bordered">
        <tbody>

        <?php
        echo "<tr>";
        echo "    <th>ناو </th>";
        echo "<td>".$get_res_fetch['fname'] .' '.$get_res_fetch['lname']."</td>";
        echo "<th>ژمارەی تەلەفۆن</th>" ;
        echo "<td>".$get_res_fetch['phone']."</td>";

        echo "</tr>";
        echo "<tr>";
        echo "<th>تەمەن</th>";
        echo "<td>".$get_res_fetch['age']."</td>";

        echo "<th>جۆر</th>";

        if($get_res_fetch['type'] == 1 ){
          $type = 0 ;
          echo "<td>بەخشینی خوێن</td>";
        }else{
          $type = 1 ;
          echo "<td>وەرگری خوێن</td>";
        }
        echo "</tr><tr>";
        echo "<th>گروپی خوێن</th>";
        echo "<td>";
        $bloodgroup = $get_res_fetch['bloodgroup'];
        $bloods = mysqli_query($db, "SELECT * FROM `blood` where blood_id='$bloodgroup'");
        if($bloods){
          $bloods_fetch=mysqli_fetch_array($bloods);
            echo $bloods_fetch['blood_name'] ;
          }

        echo "</td>";
        echo "<th>ڕەگەز</th>";
        if($get_res_fetch['gender'] == 1 ){
          echo "<td>نێر</td>";
        }else{
          echo "<td>مێ</td>";
        }

        echo "</tr><tr>";
        echo "<th>شوێن</th>";
        echo "<td>".$get_res_fetch['location']."</td>"; 
        echo "<th>بانك</th>";
        echo "<td>";
        $bank = mysqli_query($db, "SELECT * FROM `bank` where b_id='{$get_res_fetch['bank_id']}'");
        if($bank){
          $bank_fetch=mysqli_fetch_array($bank);
            echo $bank_fetch['b_name'] ;
        }
        echo "</td>";
        echo "</tr><tr>";
         if($get_res_fetch['type']==0 && $get_res_fetch['finish']==1){
          $res_query=mysqli_query($db, "SELECT * FROM reservation WHERE r_id='{$get_res_fetch['opposite']}'");
          $res_fetch=mysqli_fetch_array($res_query);
          ?>
          <th colspan="3">بەخشەری خوێن</th>
        <td>
         <?php echo $res_fetch['fname'].' '.$res_fetch['lname'];?></td>
          <?php
        }

        echo "</tr>";
        ?>
          </tbody>
        </table>
        </a>
        <br><hr><br>
    <?php
  }
  }else{
    ?>
    <div class="alert alert-warning text-center">هیچ تۆمارێک نییە</div>
    <?php
  }
}
?>
</table>
<?php
  include('./footer.php');
?>