<?php include "includes/header.php" ?>

<?php $admin = $_SESSION['admin_id'] ?>

<?php 
        $query = mysqli_query($connection, "select * FROM tbl_constituent where admin_id = '$admin'")or die(mysqli_error());
        $constituent = mysqli_num_rows($query);

        $query = mysqli_query($connection, "select * FROM tbl_indigency where admin_id = '$admin'")or die(mysqli_error());
        $indigency = mysqli_num_rows($query);
?>


<body>

<!--Header-part-->
<?php include "includes/nav.php" ?>
<!--close-top-Header-menu-->

<?php include "includes/menu.php" ?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="container-fluid">
   	<div class="quick-actions_homepage">

   </div>
    <div class="row-fluid">

      <div class="span7">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
            <h5>Upcoming Events</h5>
          </div>


          <?php $date = new DateTime(); ?>



          <?php $query = "SELECT * FROM tbl_events where admin_id = $admin order by  start_event DESC LIMIT 5"; 
         $result = mysqli_query($connection, $query);
         while($row = mysqli_fetch_assoc($result)){

          $title = $row['title'];

          $startevent = date('j', strtotime($row['start_event'])); 

          $starteventmonth = date('M', strtotime($row['start_event'])); 

        ?>

          <div class="widget-content nopadding updates">
            <div class="new-update clearfix"><i class="icon-ok-sign"></i>
              <div class="update-done"><a title="" href="#"><strong><?php echo $title ?></strong></a> <span></span> </div>
              <div class="update-date"><span class="update-day"><?php echo  $startevent  ?></span><?php echo  $starteventmonth  ?></div>
            </div>
          </div>
         <?php } ?>

        </div>
      </div>

 
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
            <h5>Barangay Statistic</h5>
          </div>
          <div class="widget-content nopadding updates">
          <div class="center">
              <ul class="stat-boxes2">
                <li>
                  <div class="left peity_bar_neutral"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">2,4,9,7,12,10,12</span><canvas width="50" height="24"></canvas></span>
                    <canvas width="50" height="24"></canvas>
                    </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span>+10%</div>
                  <div class="right"> <strong>15598</strong> Visits </div>
                </li>
                <li>
                  <div class="left peity_line_neutral"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">10,15,8,14,13,10,10,15</span><canvas width="50" height="24"></canvas></span>
                    <canvas width="50" height="24"></canvas>
                    </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span>10%</div>
                  <div class="right"> <strong>150</strong> New Users </div>
                </li>
                <li>
                  <div class="left peity_bar_bad"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">3,5,6,16,8,10,6</span><canvas width="50" height="24"></canvas></span>
                    <canvas width="50" height="24"></canvas>
                    </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span>-40%</div>
                  <div class="right"> <strong>4560</strong> Orders</div>
                </li>
                <li>
                  <div class="left peity_line_good"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">12,6,9,13,14,10,17</span><canvas width="50" height="24"></canvas></span>
                    <canvas width="50" height="24"></canvas>
                    </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span>+60%</div>
                  <div class="right"> <strong>936</strong> Register </div>
                </li>
              </ul>
            </div>
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
<div class="row-fluid">
<div id="footer" class="span12"> 2019 Barangay Poblaction, Glan Sarangani Province </div>
</div>
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.dashboard.js"></script> 
<script src="js/maruti.chat.js"></script> 
 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
