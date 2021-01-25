<?php include "includes/header.php" ?>






<body>

<!--Header-part-->
<?php include "includes/nav.php" ?>
<!--close-top-Header-menu-->

<div id="search">
  <form action="" method="POST">
  <input type="text" placeholder="Search here..." name="search">
  <button type="submit" class="tip-left" title="" data-original-title="Search" name="btnsearch"><i class="icon-search icon-white"></i></button>
  <br><br> <br>
  </form>
</div>



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
            <h5>Barangay Repository</h5>
          </div>



          <?php

              $per_page = 10;

              if(isset($_GET['page'])) {

              $page = $_GET['page'];

              } else {

                $page = "";
              }

              if($page == "" || $page == 1) {

                $page_1 = 0;

              } else {

                $page_1 = ($page * $per_page) - $per_page;

              }

              $count  = ceil($count /$per_page);

              $query = "SELECT * FROM constituent LIMIT $page_1, $per_page";

              ?>

      <?php 
      
      if (isset($_POST['btnsearch'])){

        $search = $_POST['search'];

          displayRepoSearch($search);
      }else{
        displayRepo();
      }

      ?>

  <ul class="pager">

      <?php 
        $number_list = array();
        for($i =1; $i <= $count; $i++) {

          if($i == $page) {

              echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";

          }  else {

              echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";

          }

        }

      ?>
            
  </ul>


        </div>
      </div>
    </div>
  </div>
</div>





<?php include "includes/footer.php" ?>