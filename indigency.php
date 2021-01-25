<?php include "includes/cert_header.php" ?>

<?php $id = $_GET['id']; ?>


<?php

  $query = "SELECT * FROM tbl_constituent where constituent_id = '$id'";

  $result = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($result)){
                                  
      $id = $row['constituent_id'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $address = $row['address'];
      $birthday= date('Y', strtotime($row['birthday'])); 



      }

      $timezone = new DateTimeZone("Asia/Manila" );
			$date = new DateTime();
			$date->setTimezone($timezone );
			$d = $date->format('Y');

      $age = $d - $birthday;




?>



<?php 
AddIndigency(); 
AddCollection();
include "includes/confirm_print_modal.php";
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
            <h5>Certificate of Indigency</h5>
          </div>
          <div class="widget-content nopadding">

          <ul id="registration-step">
<li id="account" class="highlight">Constituent Information</li>
<li id="password">Purpose</li>
<li id="general">Billing</li>
</ul>

    <form name="frmRegistration" id="registration-form" method="post">
    <div id="account-field">
    <label>Fullname</label><span id="name-error" class="registration-error"></span>
    <div>
    <input type="hidden" name="age" id="age" class="demoInputBox" value="<?php echo $age ?>" />
    <input type="text" name="name" id="name" class="demoInputBox" value="<?php echo $fname . " " . $lname ?>" />
      </div>
    <label>Address</label><span id="address-error" class="registration-error"></span>
    <div><input type="text" name="address" id="address" class="demoInputBox" value="<?php echo $address ?>" /></div>
    <label>Gender</label><span id="gender-error" class="registration-error"></span>
    <div>
    <select name="gender" id="gender" class="demoInputBox">
    <option value="female">Female</option>
    <option value="male">Male</option>
    </select>
    </div>
    </div>
    
    <div id="password-field" style="display:none;">
    <label>Purpose of Certification</label><span id="purpose_error" class="registration-error"></span>
    <div><input type="text" name="purpose" id="purpose" class="demoInputBox" /></div>
    </div>

    <div id="general-field" style="display:none;">
    <label>Amount Paid</label><span id="amount_error" class="registration-error"></span>
    <div><input type="number" name="amount" id="amount" class="demoInputBox" required/></div>
  
    </div>
    <div>
    <input class="btn btn-info" type="button" name="back" id="back" value="Back" style="margin-top: 20px;">
    <input class="btn btn-info" type="button" name="next" id="next" value="Next" style="margin-top: 20px;">
    <input class="btn btn-info" type="submit" name="finish" id="finish" value="Save and Print" style="display:none; margin-top: 20px" >
    <a rel='{$id}' href='javascript:void(0)' id="preview" class='btn btn-info delete_link'  target="_blank" style="display:none; margin-top: 20px"> Preview </a>

  </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<script>

$(document).ready(function(){
 
  $(".delete_link").on('click', function(){

   var name = document.getElementById("name").value;
   var address = document.getElementById("address").value;
   var gender = document.getElementById("gender").value;
   var age = document.getElementById("age").value;
   var purpose = document.getElementById("purpose").value;
   var amount = document.getElementById("amount").value;
   var collectionname = "Indigency Certificate";

   var delete_url = "print_receipt.php?name="+name+"&address="+address+"&gender="+gender+"&age="+age+"&purpose="+purpose+"&amount="+amount+"&collectionname="+collectionname+" ";

   $(".modal_delete_link").attr("href", delete_url);
   $("#myModal").modal('show');


  });

});
</script>




<?php include "includes/footer.php" ?>