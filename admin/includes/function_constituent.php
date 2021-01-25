<?php 

function insert(){

    global $connection;

    if(isset($_POST['save'])){
            $fname = $_POST['fname'] ;
            $mname = $_POST['mname'] ;
            $lname = $_POST['lname'] ;
            $gender = $_POST['gender'] ;
            $birthdate = $_POST['birthdate'] ;
            $birthplace = $_POST['birthplace'] ;
            $civilstatus = $_POST['civilstatus'] ;
            $address = $_POST['address'] ;
            $lat = $_POST['lat'] ;
            $lon = $_POST['lon'] ;
            $admin_id = $_SESSION['admin_id'];

            if ($fname == "" || empty($fname)){
                echo "Failed should not be empty";
            }else{

                $query = "INSERT tbl_constituent  (fname, mname, lname, gender, birthday, birthplace, civilstatus, address, lat, lon, admin_id) VALUES ('$fname', '$mname', '$lname', '$gender', '$birthdate', '$birthplace', '$civilstatus',  '$address', '$lat', '$lon', '$admin_id')";

                $insert = mysqli_query($connection, $query);

                if (!$insert){
                    die("Failed" . mysqli_error($connection));
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("Constituent Sucessfully Added")';
                    echo '</script>';
                }
            }

        }
    }

    function insertblotter(){

        global $connection;
    
        if(isset($_POST['save'])){
                $complainant = $_POST['complainant'] ;
                $place = $_POST['place'] ;
                $respondent = $_POST['respondent'] ;
                $address = $_POST['address'] ;
                $confrontation = $_POST['confrontation'] ;
                $incident = $_POST['incident'] ;
                $admin_id = $_SESSION['admin_id'];
    
                if ($complainant == "" || empty($complainant)){
                    echo "Failed should not be empty";
                }else{
    
                    $query = "INSERT tbl_blotter  (complainant_name, placeofincident, respondent_name, respondent_address, conforntation_regarding, date_of_incident, admin_id) VALUES ('$complainant', '$place', '$respondent', '$address', '$confrontation', '$incident', '$admin_id')";
    
                    $insert = mysqli_query($connection, $query);
    
                    if (!$insert){
                        die("Failed" . mysqli_error($connection));
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("Blotter Sucessfully Added")';
                        echo '</script>';
                    }
                }
    
            }
        }

    function display(){


        global $connection;

        $admin_id = $_SESSION['admin_id'];

        $query = "SELECT * FROM tbl_constituent where admin_id = '$admin_id'";
    
        $result = mysqli_query($connection, $query);
    
            while($row = mysqli_fetch_assoc($result)){
                                        
            $id = $row['constituent_id'];
            $fname = $row['fname'];
            $mname= $row['mname'];
            $lname= $row['lname'];
            $gender= $row['gender'];
            $birthday= $row['birthday'];
            $civilstatus= $row['civilstatus'];
            $address= $row['address'];
            $isAlive= $row['isAlive'];

            echo "<tr>";
            echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='{$id}'></td>";
            echo "<td>{$id}</td>";
            echo "<td>{$fname}</td> ";
            echo "<td>{$mname}</td> ";
            echo "<td>{$lname}</td> ";
            echo "<td>{$gender}</td> ";
            echo "<td>{$birthday}</td> ";
            echo "<td>{$civilstatus}</td> ";
            echo "<td>{$address}</td> ";
            echo "<td>{$isAlive}</td> ";

            echo "<td>";
                echo "<a rel='{$id}' href='javascript:void(0)' class='delete_link'> Delete ";
                echo "<a href='edit_constituent.php?edit={$id}'> Edit ";
                echo "</a>";
            echo "</td>";
            echo "</tr>";
            }
        }

        function displayevent(){

            global $connection;
    
            $admin_id = $_SESSION['admin_id'];
    
            $query = "SELECT * FROM tbl_events where admin_id = '$admin_id'";
        
            $result = mysqli_query($connection, $query);
        
                while($row = mysqli_fetch_assoc($result)){
                                            
                $id = $row['id'];
                $title = $row['title'];
                $start_event= $row['start_event'];
                $end_event= $row['end_event'];
                $event_desc= $row['event_desc'];
    
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$title}</td> ";
                echo "<td>{$start_event}</td> ";
                echo "<td>{$end_event}</td> ";
                echo "</tr>";
                }
            }

        function displayconstituentreport(){


            global $connection;
    
            $admin_id = $_SESSION['admin_id'];
    
            $query = "SELECT * FROM tbl_constituent where admin_id = '$admin_id'";
        
            $result = mysqli_query($connection, $query);
        
                while($row = mysqli_fetch_assoc($result)){
                                            
                $id = $row['constituent_id'];
                $fname = $row['fname'];
                $mname= $row['mname'];
                $lname= $row['lname'];
                $gender= $row['gender'];
                $birthday= $row['birthday'];
                $civilstatus= $row['civilstatus'];
                $address= $row['address'];
                $isAlive= $row['isAlive'];
    
                echo "<tr>";
                echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='{$id}'></td>";
                echo "<td>{$id}</td>";
                echo "<td>{$fname}</td> ";
                echo "<td>{$mname}</td> ";
                echo "<td>{$lname}</td> ";
                echo "<td>{$gender}</td> ";
                echo "<td>{$birthday}</td> ";
                echo "<td>{$civilstatus}</td> ";
                echo "<td>{$address}</td> ";
                echo "<td>{$isAlive}</td> ";
    
                echo "</tr>";
                }
            }

        function displayblotter(){

            global $connection;
    
            $admin_id = $_SESSION['admin_id'];
    
            $query = "SELECT * FROM tbl_blotter where admin_id = '$admin_id'";
        
            $result = mysqli_query($connection, $query);
        
                while($row = mysqli_fetch_assoc($result)){
                                            
                $id = $row['blotter_id'];
                $complainant_name = $row['complainant_name'];
                $placeofincident= $row['placeofincident'];
                $respondent_name= $row['respondent_name'];
                $respondent_address= $row['respondent_address'];
                $conforntation_regarding= $row['conforntation_regarding'];
                $date_of_incident= $row['date_of_incident'];

    
                echo "<tr>";
                echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='{$id}'></td>";
                echo "<td>{$id}</td>";
                echo "<td>{$complainant_name}</td> ";
                echo "<td>{$placeofincident}</td> ";
                echo "<td>{$respondent_name}</td> ";
                echo "<td>{$respondent_address}</td> ";
                echo "<td>{$conforntation_regarding}</td> ";
                echo "<td>{$date_of_incident}</td> ";
        
    
                echo "<td>";
                    echo "<a rel='{$id}' href='javascript:void(0)' class='delete_link'> Delete ";
                    echo "<a href='edit_constituent.php?edit={$id}'> Edit ";
                    echo "</a>";
                echo "</td>";
                echo "</tr>";
                }
            }


        function UpdateConstituent(){

            global $connection;


            if(isset($_POST['update'])){
                    $id = $_POST['id'] ;
                    $fname = $_POST['fname'] ;
                    $mname = $_POST['mname'] ;
                    $lname = $_POST['lname'] ;
                    $gender = $_POST['gender'] ;
                    $birthdate = $_POST['birthdate'] ;
                    $birthplace = $_POST['birthplace'] ;
                    $civilstatus = $_POST['civilstatus'] ;
                    $address = $_POST['address'] ;
                    $isAlive = $_POST['isalive'] ;
                    $lat = $_POST['lat'] ;
                    $lon = $_POST['lon'] ;
                    $admin_id = $_SESSION['admin_id'];
        
                    if ($fname == "" || empty($fname)){
                        echo "Failed should not be empty";
                    }else{

                        $query = "UPDATE tbl_constituent SET fname='$fname', mname='$mname', lname='$lname', gender='$gender', birthday='$birthdate', civilstatus='$civilstatus', address='$address', isAlive='$isAlive', lat='$lat', lon='$lon' WHERE constituent_id=$id";
        
                        $insert = mysqli_query($connection, $query);
        
                        if (!$insert){
                            die("Failed" . mysqli_error($connection));
                        }else{
                            echo '<script language="javascript">';
                            echo 'alert("Constituent Sucessfully Updated")';
                            echo '</script>';
                        }
                    }
        
                }
            }


            function DiplayEditConstituent($id){

                global $connection;

                global $fname;
                global $mname;
                global $lname;
                global $gender;
                global $birthday;
                global $civilstatus;
                global $address;
                global $lat;
                global $lon;
                global $birthplace;
                global $isAlive;
                    
                $query = "SELECT * FROM tbl_constituent where constituent_id = $id";
            
                $result = mysqli_query($connection, $query);
            
                    while($row = mysqli_fetch_assoc($result)){
                                                
                    $id = $row['constituent_id'];
                    $fname = $row['fname'];
                    $mname= $row['mname'];
                    $lname= $row['lname'];
                    $gender= $row['gender'];
                    $birthday= $row['birthday'];
                    $birthplace= $row['birthplace'];
                    $civilstatus= $row['civilstatus'];
                    $lat= $row['lat'];
                    $lon= $row['lon'];
                    $address= $row['address'];
                    $isAlive= $row['isAlive'];
        
                }
        
            }
               


        function displayForCert(){

            global $connection;
            $admin_id = $_SESSION['admin_id'];
               
            $query = "SELECT * FROM tbl_constituent where admin_id = 'admin_id'";
        
            $result = mysqli_query($connection, $query);
        
                while($row = mysqli_fetch_assoc($result)){
                                            
                $id = $row['constituent_id'];
                $fname = $row['fname'];
                $mname= $row['mname'];
                $lname= $row['lname'];
                $gender= $row['gender'];
                $address= $row['address'];
               
    
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$fname}</td> ";
                echo "<td>{$mname}</td> ";
                echo "<td>{$lname}</td> ";
                echo "<td>{$gender}</td> ";
                echo "<td>{$address}</td> ";
                echo "<td>NONE</td> ";
    
    
                echo "<td>";
                    echo "<a href='indigency.php?id={$id}'> Issue Indigency Certificate ";
                    echo "</a>";
                echo "</td>";
                echo "</tr>";
                }
            }
    


    function displayProfile($id){

        global $connection;
        global $fname;
        global $mname;
        global $lname;
        global $gender;
        global $birthday;
        global $civilstatus;
        global $address;
        global $lat;
        global $lon;
        global $isAlive;
        global $birthplace;
            
        $query = "SELECT * FROM tbl_constituent where constituent_id = $id";
    
        $result = mysqli_query($connection, $query);
    
            while($row = mysqli_fetch_assoc($result)){
                                        
            $id = $row['constituent_id'];
            $fname = $row['fname'];
            $mname= $row['mname'];
            $lname= $row['lname'];
            $gender= $row['gender'];
            $birthday= $row['birthday'];
            $birthplace= $row['birthplace'];
            $civilstatus= $row['civilstatus'];
            $lat= $row['lat'];
            $lon= $row['lon'];
            $address= $row['address'];
            $isAlive= $row['isAlive'];

        }

    }
        
        
    function displayRepo(){

        global $connection;
        
        $admin_id = $_SESSION['admin_id'];
            
        $query = "SELECT * FROM tbl_constituent";
    
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


            echo "<div class='widget-content nopadding'>";
            echo "<div class='span4'>";
                echo"<div class='widget-box' style='margin-right: 5px'>";
                    echo "<ul class='recent-posts'>";
                        echo "<li>";
                            echo "<div class='user-thumb'> <img width='40' height='40' alt='User' src='img/demo/av1.jpg'> </div>";
                            echo "<div class='article-post'>";
                                echo "<div class='fr'><a href='constituent_profile.php?id={$id}' class='btn btn-primary btn-mini'>View</a> </div> ";
                                echo "Name: {$fname} {$mname} {$lname}<br>";
                                echo "<span class='user-info'> Gender: {$gender}  </span><br>";
                                echo "<span class='user-info'> Age: {$age}} </span><br>";
                                echo "<br>";
                                echo "<p><a href='#'>Address: {$address} </a> </p>";
                            echo "</div>";
                        echo "</li>";
                    echo "</ul>";
                echo "</div>";
            echo "</div>";
            echo "</div>";

            }
        }


        function displayRepoSearch($key){

            global $connection;
            $admin_id = $_SESSION['admin_id'];
                
            $query = "SELECT * FROM tbl_constituent where fname LIKE '%$key%' or mname LIKE '%$key%' or lname LIKE '%$key%'";
        
            $result = mysqli_query($connection, $query);
        
                while($row = mysqli_fetch_assoc($result)){
                                            
                $id = $row['constituent_id'];
                $fname = $row['fname'];
                $mname= $row['mname'];
                $lname= $row['lname'];
                $gender= $row['gender'];
                $birthday= $row['birthday'];
                $civilstatus= $row['civilstatus'];
                $address= $row['address'];
                
                 echo "<div class='widget-content nopadding'>";
                echo "<div class='span4'>";
                    echo"<div class='widget-box' style='margin-right: 5px'>";
                        echo "<ul class='recent-posts'>";
                            echo "<li>";
                                echo "<div class='user-thumb'> <img width='40' height='40' alt='User' src='img/demo/av1.jpg'> </div>";
                                echo "<div class='article-post'>";
                                    echo "<div class='fr'><a href='constituent_profile.php?id={$id}' class='btn btn-primary btn-mini'>View</a> </div> ";
                                    echo "Constituent Name: {$fname} {$mname} {$lname}<br>";
                                    echo "<span class='user-info'> Gender: {$gender}  </span><br>";
                                    echo "<span class='user-info'> Age: 18 </span><br>";
                                    echo "<br>";
                                    echo "<p><a href='#'>Address:{$address} </a> </p>";
                                echo "</div>";
                            echo "</li>";
                        echo "</ul>";
                    echo "</div>";
                echo "</div>";
                echo "</div>";



                }
            }


                function AddIndigency(){

                    global $connection;
                
                    if(isset($_POST['finish'])){
                            $name = $_POST['name'] ;
                            $address = $_POST['address'] ;
                            $gender = $_POST['gender'] ;
                            $purpose = $_POST['purpose'] ;
                            $amount = $_POST['amount'] ;
                            $admin_id = $_SESSION['admin_id'];

            

                            if ($name == "" || empty($name)){
                                echo '<script language="javascript">';
                                    echo 'alert("Fields should not be empty")';
                                    echo '</script>';
                            }else{
                
                                $query = "INSERT tbl_indigency  (fullname, address, gender, date_added, amount_paid, purpose, admin_id) VALUES ('$name', '$address', '$gender', now(), '$amount', '$purpose', '$admin_id')";
                
                                $insert = mysqli_query($connection, $query);

                                $last_id = mysqli_insert_id($connection);
                
                                if (!$insert){
                                    die("Failed" . mysqli_error($connection));
                                }else{

    
                                //    header ("Location: print_indigency.php?name=$name&address=$address&gender=$gender");
                                
                                   
                                }
                            }
                
                        }
                    }


?>