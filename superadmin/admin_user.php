<?php include "includes/header.php" ?>


<?php AddAdminUser() ?>

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
      <div class="span3">

      </div>

      <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-info-sign"></i></span>
            <h5>Admin Information</h5>
          </div>
          <div class="widget-content nopadding">
         
          <form action="" method="POST" class="form-horizontal">

          <div class="control-group">
                <label class="control-label">Barangay:</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Barangay Name" name="barangay">
                </div>
              </div>
          
              <div class="control-group">
                <label class="control-label">Name:</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Name" name="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">User Role</label>
                <div class="controls" >
                <select class="span6" name="user_role">
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Username:</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="username" name="username">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password:</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="password" name="password">
                </div>
              </div>
              <br/>
                                           
              <div class="form-actions">
                <button type="submit" class="btn btn-success" name="save">Save</button>
              </div>
            </form>	
          </div>
        </div>
      </div>

    <div class="row-fluid">
      <div class="span3">
        
      </div>

    
    <hr>

  </div>
</div>
</div>
</div>
</div>




<?php include "includes/footer.php" ?>