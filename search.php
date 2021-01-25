<?php include "includes/header.php" ?>



<body>

<!--Header-part-->
<?php include "includes/nav.php" ?>
<!--close-top-Header-menu-->

<div id="search">
  <form action="asdsdasd" method="GET">
  <input type="text" placeholder="Search here...">
  <button type="submit" class="tip-left" title="" data-original-title="Search"><i class="icon-search icon-white"></i></button>
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



     <?php displayRepo() ?>



        </div>
      </div>
    </div>
  </div>
</div>





<?php include "includes/footer.php" ?>