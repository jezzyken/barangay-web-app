<?php include "includes/header.php" ?>


<body>

<!--Header-part-->
<?php include "includes/nav.php" ?>
<!--close-top-Header-menu-->

<?php include "includes/menu.php" ?>




<div id="content">
  <div id="content-header">
    
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
             
            <h5>Barangay Collection Report</h5>
          </div>
          <div class="widget-content nopadding">

<div class="span7">
          <div class="control-group">
               
                
                <form method="post" >
                <div class="controls">
                <div data-date="12-02-2012" class="input-append date datepicker">
                    <input type="text" value="12-02-2012" data-date-format="mm-dd-yyyy" class="span10" name="datefrom">
                    <span class="add-on"><i class="icon-th"></i></span> </div>


                    <div data-date="12-02-2012" class="input-append date datepicker">
                    <input type="text" value="12-02-2012" data-date-format="mm-dd-yyyy" class="span10" name="dateto">
                    <span class="add-on"><i class="icon-th"></i></span> </div>


                  <input type="submit" class="btn btn-inverse" value="Apply" name="submit" style="margin-top: -10px">
                  <a class="btn btn-warning" href="constituent.php" style="margin-top: -10px">Print</a>
                </div>

                <div class="controls">
                <label class="control-label span3" style="padding-left: 80px;">FROM</label>
                <label class="control-label span3" style="padding-left: 170px;">TO </label>
            
                </div>
                
              </div>
              </div>
              </form>

 

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Collection Name</th>
                  <th>Amount Paid</th>
                  <th>Date Issued</th>
                  <th>Issued by</th>
                </tr>
              </thead>
              <tbody>

              <?php if (isset($_POST['submit'])){
                $datefrom = $_POST['datefrom'];
                $dateto = $_POST['dateto'];


                // $date = new DateTime();
                // $datefrom = $date->format('Y-m-d');
                // $dateto = $date->format('Y-m-d');

                $datefrom = date('Y-m-d', strtotime($_POST['datefrom'])); 
                $dateto = date('Y-m-d', strtotime($_POST['dateto'])); 

      
                report($datefrom,  $dateto);

              }

              
              ?>
                
           
     
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<?php include "includes/footer.php" ?>