<?php include "includes/header.php" ?>
<?php $id = $_GET["edit"]; 

?>



<?php DiplayEditConstituent($id) ?>
<?php UpdateConstituent() ?>


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
                  <input type="hidden" class="span11" placeholder="First Name" name="id" value="<?php echo $id ?> ">  
                  <input type="text" class="span11" placeholder="First Name" name="fname" value="<?php echo $fname ?>" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Middle Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Middle Name" name="mname" value="<?php echo $mname ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Last Name" name="lname" value="<?php echo $lname ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Select Gender</label>
                <div class="controls" >
                <select class="span6" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Birthdate (mm-dd)</label>
                <div class="controls">
                  <div data-date="12-02-2012" class="input-append date datepicker">
                    <input type="text" data-date-format="mm-dd-yyyy" class="span11" name="birthdate" value="<?php echo $birthday ?>">
                    <span class="add-on"><i class="icon-th"></i></span> </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">BirthPlace</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Birth Place" name="birthplace" value="<?php echo $birthplace ?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Civil Status</label>
                <div class="controls" >
                <select class="span6" name="civilstatus">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Address" name="address" value="<?php echo $address?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">IsAlive</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Status" name="isalive" value="<?php echo $isAlive?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Geolocation</label>
                <div class="controls">
                  <input type="text" class="span5" placeholder="Longitute" name="lat"  readonly onkeypress='validateLatLng(event)' id="latitude"  value="<?php echo $lat?>">
                  <input type="text" class="span5" placeholder="latitude" name="lon"  readonly onkeypress='validateLatLng(event)' id="longitude" value="<?php echo $lon?>">
                </div>
              </div>
              <br/>
                                           
              <div class="form-actions">
                <button type="submit" class="btn btn-success" name="update">Update</button>
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
              <h4>Click the Map to get latitude/longitude:</h4>
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
                var mapDiv = document.getElementById('map');
                    var map = new google.maps.Map(mapDiv, {
                        center: {lat: 5.790431116136257, lng: 125.36697309544832},
                         zoom: 11
                    
                    });

                    var opt = { minZoom: 11, maxZoom: 25 };
                         map.setOptions(opt);

                    var flightPlanCoordinates = [
          {lat: 37.772, lng: -122.214},
          {lat: 21.291, lng: -157.821},
          {lat: -18.142, lng: 178.431},
          {lat: -27.467, lng: 153.027}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);

                var marker;
                google.maps.event.addListener(map, 'click', function (mouseEvent) {

                    if(marker != null)
                      marker.setMap(null);

                    var lat = document.getElementById('latitude');
                    var longi = document.getElementById('longitude');
                    lat.value = mouseEvent.latLng.lat(); //alert(mouseEvent.latLng.toUrlValue());
                    longi.value = mouseEvent.latLng.lng();

                    marker = new google.maps.Marker({
                        position: mouseEvent.latLng,
                        map: map,
                        title: 'Here!'
                    });

                    geocodePosition(marker.getPosition());

                });

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