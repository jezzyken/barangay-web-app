<?php include "includes/header.php" ?>
<?php $id = $_GET['id']; ?>



<?php insert(); ?>

<?php displayProfile($id); ?>










<body>

<!--Header-part-->
<?php include "includes/nav.php" ?>
<!--close-top-Header-menu-->

<?php include "includes/menu.php" ?>


<div id="content">
  <div id="content-header">
  </div>
  <div class="container-fluid">
   	<div class="quick-actions_homepage">
 
   </div>

    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-info-sign"></i></span>
            <h5>Constituent Information</h5>
          </div>
          <div class="widget-content nopadding">
         
          <form action="" method="POST" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">First Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="First Name" name="fname" value=" <?php echo $fname; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Middle Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Middle Name" name="mname" value=" <?php echo $mname; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Last Name" name="lname" value=" <?php echo $lname; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Gender</label>
                <div class="controls" >
                  <input type="text" class="span11" placeholder="Last Name" name="lname" value=" <?php echo $gender; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Birthdate (mm-dd)</label>
                <div class="controls">
                <input type="text" class="span11" placeholder="Last Name" name="lname" value=" <?php echo $birthday; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">BirthPlace</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Birth Place" name="birthplace" value=" <?php echo $birthplace; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Civil Status</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Civil Status" name="civilstatus" value=" <?php echo $civilstatus; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Address" name="address" value=" <?php echo $address; ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">IsAlive</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Status" name="isAlive" value=" <?php echo $isAlive; ?>" readonly>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Geolocation</label>
                <div class="controls">
                  <input type="text" class="span5" placeholder="Longitute" name="lat" readonly onkeypress='validateLatLng(event)' id="latitude" value="<?php echo $lat ?>">
                  <input type="text" class="span5" placeholder="latitude" name="lon" readonly onkeypress='validateLatLng(event)' id="longitude" value="<?php echo $lon ?>">
                </div>
              </div>
              <br/>
                                           
              <div class="form-actions">
                <!-- <button type="submit" class="btn btn-success" name="save">Save</button> -->
              </div>
            </form>	
          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
            <h5>Map</h5>
          </div>
          <div class="widget-content nopadding updates">
          <div class="panel-body">
            <div class="col-md-5">
              <div id="map" style="width:100%; height:500px"></div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>

  </div>
</div>
</div>
</div>



<script type="text/javascript">
            $(function(){

              // alert("<?php echo $lat ?>")


                var mapDiv = document.getElementById('map');
                    var map = new google.maps.Map(mapDiv, {
                        center: {lat: -34.397, lng: 150.644},
                         zoom: 8

                    });

                    var marker1 = new google.maps.Marker({
                      position: {lat: <?php echo $lat ?>, lng: <?php echo $lon ?>},
                      map: map,
                      title: '<?php echo $fname ." " . $lname  . " Location"?>'
                    });

                var marker;



                var geocoder = new google.maps.Geocoder();
                function codeAddress(address) {
                    //In this case it gets the address from an element on the page,
                    // but obviously you  could just pass it to the method instead
                    geocoder.geocode( { 'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            //In this case it creates a marker, but you can get the lat and lng from the location.LatLng
                            if(marker != null)
                                  marker.setMap(null);

                            map.setCenter(results[0].geometry.location);
                            marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location
                            });

                            var lat = document.getElementById('latitude');
                            var longi = document.getElementById('longitude');
                            lat.value = results[0].geometry.location.lat();
                            longi.value = results[0].geometry.location.lng();

                        } else {
                            alert("Geocode was not successful for the following reason: " + status);
                        }
                    });
                }

                function geocodePosition(pos) {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        latLng: pos
                        }, function(responses) {
                            if (responses && responses.length > 0) {
                                var txtAddress = document.getElementById('txtAddress');
                                txtAddress.value = responses[0].formatted_address;
                            }
                        });
                }

                document.getElementById("btnGeocode").addEventListener("click", function(){
                    var txtAddress = document.getElementById("txtAddress");
                    codeAddress(txtAddress.value);
                });

            });

            function validateLatLng(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode( key );
                if(theEvent.keyCode == 8 || theEvent.keyCode == 127) {

                }
                else {
                    var regex = /[0-9.]|\./;
                    if( !regex.test(key) ) {
                      theEvent.returnValue = false;
                      if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            }
        </script>

<?php include "includes/footer.php" ?>