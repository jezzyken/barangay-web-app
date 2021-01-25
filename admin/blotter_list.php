<?php include "includes/header.php" ?>


<?php
    if(isset($_GET['delete'])){

        $id = $_GET['delete'];

        $query = "DELETE from tbl_constituent where constituent_id = $id ";

        $result = mysqli_query($connection, $query);

    }

?>

<?php include "includes/constituent_delete_modal.php" ?>



<?php 

if (isset($_POST['checkBoxArray'])){

  foreach($_POST['checkBoxArray'] as $postValueId){

      $bulk_option = $_POST['bulk_option'];

      switch($bulk_option){
  
          case "Delete":
          $query = "DELETE from tbl_constituent where constituent_id = $id ";
          $result = mysqli_query($connection, $query);
          break;

      }

  }
 


}


?> 



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
            <h5>Constituent List</h5>
          </div>

          <div class="widget-content nopadding">

<form action="" method="POST">
          <div id="bulkOptionContainer" class="span2" style="padding: 0px; margin-left: 10px;">
        <select class="form-control" name="bulk_option" id="">
            <option value="">Select Option</option>
            <option value="Delete">Delete</option>
        </select>
    </div>
    <div class="col-sx-0" style="padding: 0px; margin-top: 20px; margin-bottom: 20px;">
        <input type="submit" class="btn btn-inverse" value="Apply" name="submit">
        <a class="btn btn-warning" href="blotter.php">Add New</a>
    </div>

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><input id="selectAllBoxes" type="checkbox"></th>
                  <th>ID</th>
                  <th>Complainant Name</th>
                  <th>Place of Incident</th>
                  <th>Respondent Name</th>
                  <th>Respondent Address</th>
                  <th>Confrontation Regarding</th>
                  <th>Date of Incident</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
              <?php displayblotter();?>
     
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){
 
  $(".delete_link").on('click', function(){

   var id = $(this).attr("rel");
   var delete_url = "constituent_list.php?delete="+ id +" ";

   $(".modal_delete_link").attr("href", delete_url);
   $("#myModal").modal('show');


  });

});
</script>





<?php include "includes/footer.php" ?>