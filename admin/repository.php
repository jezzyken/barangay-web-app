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


<?php $admin_id = $_SESSION['admin_id'] ?>




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

$per_page = 9;

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

?>

          <?php

          


      if (isset($_POST['btnsearch'])){

        $key = $_POST['search'];

        // $query = "SELECT * FROM constituent where fname LIKE '%$key%' or lname LIKE '%$key%' or mname LIKE '%$key%'";

        $post_query_count = "SELECT * FROM tbl_constituent ";

        $find_count = mysqli_query($connection,$post_query_count);
        $count = mysqli_num_rows($find_count);
        $count  = ceil($count /$per_page);

        $query = "SELECT * FROM tbl_constituent where fname LIKE '%$key%' or mname LIKE '%$key%' or lname LIKE '%$key%'LIMIT $page_1, $per_page";
            
        $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($result)){
                                        
            $id = $row['constituent_id']; 
            $fname = $row['fname'];
            $mname= $row['mname'];
            $lname= $row['lname'];
            $gender= $row['gender'];
            $birthday= date('Y', strtotime($row['birthday'])); 
            $civilstatus= $row['civilstatus'];
            $address= $row['address'];

            $timezone = new DateTimeZone("Asia/Manila" );
			$date = new DateTime();
			$date->setTimezone($timezone );
			$d = $date->format('Y');
            $age = $d - $birthday;


      ?>

        <div class="widget-content nopadding">
            <div class="span4">
                <div class="widget-box" style="margin-right: 5px">
                    <ul class="recent-posts">
                        <li>
                            <div class="user-thumb"> <img width="40" height="40" alt="User" src="../img/demo/user.png"> </div>
                            <div class="article-post"> 
                                <div class="fr"><a href="constituent_profile.php?id=<?php echo $id ?>" class="btn btn-primary btn-mini">View</a> </div>
                                Name:  <?php echo $fname  . " " . $mname . " " . $lname ?><br>
                                <span class="user-info"> Gender: <?php echo $gender ?> </span><br>
                                <span class="user-info"> <?php echo $age ?> </span><br>
                                <br>
                                <p><a href="#">Address: <?php echo $address ?></a> </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

 <?php } 

      }else{

   
            $post_query_count = "SELECT * FROM tbl_constituent";

            $find_count = mysqli_query($connection,$post_query_count);
            $count = mysqli_num_rows($find_count);
            $count  = ceil($count /$per_page);
 
            $query = "SELECT * FROM tbl_constituent  where admin_id = '$admin_id' LIMIT $page_1, $per_page";
                
            $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($result)){
                                            
                $id = $row['constituent_id'];
                $fname = $row['fname'];
                $mname= $row['mname'];
                $lname= $row['lname'];
                $gender= $row['gender'];
                $birthday= date('Y', strtotime($row['birthday'])); 
                $civilstatus= $row['civilstatus'];
                $address= $row['address'];

                $timezone = new DateTimeZone("Asia/Manila" );
                $date = new DateTime();
                $date->setTimezone($timezone );
                $d = $date->format('Y');
                $age = $d - $birthday;

          ?>

            <div class="widget-content nopadding">
                <div class="span4">
                    <div class="widget-box" style="margin-right: 5px">
                        <ul class="recent-posts">
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="../img/demo/user.png"> </div>
                                <div class="article-post"> 
                                    <div class="fr"><a href="constituent_profile.php?id=<?php echo $id ?>" class="btn btn-primary btn-mini">View</a> </div>
                                    Name:  <?php echo $fname  . " " . $mname . " " . $lname ?><br>
                                    <span class="user-info"> Gender: <?php echo $gender ?> </span><br>
                                    <span class="user-info"> Age: <?php echo $age ?></span><br>
                                    <br>
                                    <p><a href="#">Address: <?php echo $address ?></a> </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        
     <?php } }?>





        </div>
      </div>
    </div>
  </div>

  <ul class="pager">
            
            <?php 
    
            $number_list = array();
    
    
            for($i =1; $i <= $count; $i++) {
    
    
            if($i == $page) {
    
                 echo "<li '><a class='badge badge-info' href='repository.php?page={$i}'>{$i}</a></li>";
    
    
            }  else {
    
                echo "<li '><a href='repository.php?page={$i}'>{$i}</a></li>";
    
            }
    
            }
    
             ?>
                
    
            </ul>
    
</div>



    


<?php include "includes/footer.php" ?>