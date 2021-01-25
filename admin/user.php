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
            <h5>Admin Users</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>User Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
              <?php DisplayUser();?>
     
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<?php include "includes/footer.php" ?>