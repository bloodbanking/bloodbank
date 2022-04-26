<?php
  include('header.php');
?>





<div class="container">
  <br>
  <div class="row justify-content-md-center">    
  <?php
    $select_bank_query = mysqli_query($db, "SELECT * FROM `bank`");
    if($select_bank_query){
      while($select_bank_fetch=mysqli_fetch_array($select_bank_query)){
        ?>
        <a href="locations.php?b_id=<?php echo $select_bank_fetch['b_id'] ; ?>" class='col-md-4'>
          <div class="img-bank">
            <img src="./jpg/bank.jpg">
          </div>
          <p class="title-bank">
            <?php echo $select_bank_fetch['b_name'] ; ?>
            
          </p>
        </a>
        <?php
      }
    }
    ?>
  </div>



  <div class="row">
  <?php
    if(isset($_GET['b_id']) && $_GET['b_id'] != ""){
      echo "<hr>" ;
      $b_id = $_GET['b_id'];
      $select_bank_query_get = mysqli_query($db, "SELECT * FROM `bank` where b_id='$b_id' ");
      if($select_bank_query_get){
        while($select_bank_fetch_get=mysqli_fetch_array($select_bank_query_get)){
          ?>
          <div class="col-md-4">
            <h1>
              <?php echo $select_bank_fetch_get['b_name'] ; ?>
            </h1>



<ul class="list-group">




  <?php
    $select_bloods_query = mysqli_query($db, "SELECT * FROM `blood`");
    if($select_bloods_query){
      while($select_bloods_fetch=mysqli_fetch_array($select_bloods_query)){
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold"><?php echo $select_bloods_fetch['blood_name'] ; ?></div>
          </div>
          <span class="badge bg-primary rounded-pill">
            <?php
            $blood_id = $select_bloods_fetch['blood_id'] ;
            $all_reservarion_count_query = mysqli_query($db, "SELECT COUNT(r_id) as total FROM `reservation` where bloodgroup='$blood_id' and bank_id='$b_id' and `type`='1' and finish='0'");
            if($all_reservarion_count_query){
              $all_reservarion_count_fetch=mysqli_fetch_array($all_reservarion_count_query);
              echo($all_reservarion_count_fetch["total"]);
            }

            ?>

          </span>
        </li>
        <?php
      }
    }
  ?>
</ul>




          <?php
            $lng =  $select_bank_fetch_get['lng'] ; 
            $lat =  $select_bank_fetch_get['lat'] ; 
          ?>
          </div>
          <div class="col-md-8">
            <div id="map" style="height:400px;width:100%;"></div>
            <br>
          <a class="btn btn-success" target="blank" href="
https://www.google.com/maps/dir/Current+Location/<?php echo $lat; ?>,<?php echo $lng ;  ?>" >
بەدەستهێنانی ئاڕاستە لەسەر نەخشەی گووگڵ
</a>

          </div>
              
            </p>
          </a>



              <script>

 var map, infoWindow,pos ; 
 var lng = <?php echo $lng ?>;
 var lat = <?php echo $lat ?>;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {
              lat:lat,
              lng: lng,
          },

          zoom: 9
        });
        infoWindow = new google.maps.InfoWindow;

        
            pos = {
              lat:lat,
              lng: lng,
            };

            lat = pos['lat'];
            lng = pos['lng'];

            infoWindow.setPosition(pos);
            map.setCenter(pos);

        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        marker = new google.maps.Marker({
            // icon: image,
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP,
            position: pos ,
            title : 'سولی بڵۆد بانك',
          });

         


      }










      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }



              
              </script>
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL6m2kCuEdmmC3G25lzcuaBQ1ZMSBBwVc&callback=initMap"
              async defer></script>




          <?php
        }
      }
    }
  ?>
  </div>



</div>


<?php
  include('footer.php');
?>