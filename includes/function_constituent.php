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

                $query = "INSERT tbl_constituent  (fname, mname, lname, gender, birthday, birthplace, civilstatus, address, lat, lon, admin_id) VALUES ('$fname', '$mname', '$lname', '$gender', '$birthdate', '$birthplace', '$civilstatus', '$address', '$lat', '$lon', '$admin_id')";

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
                // echo "<a href='constituent_list.php?delete={$id}'> Delete ";
                echo "<a href='?edit={$id}'> Edit ";
                echo "</a>";
            echo "</td>";
            echo "</tr>";
            }
        }

        function displayForCert(){

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


            function displayForCertification(){

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
                        echo "<a href='certification.php?id={$id}'> Issue Certificate ";
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
        
        
    function displayRepo(){

        global $connection;
        
        $admin_id = $_SESSION['admin_id'];
            
        $query = "SELECT * FROM tbl_constituent ";
    
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
                                echo "Constituent Name: {$fname} {$mname} {$lname}<br>";
                                echo "<span class='user-info'> Gender: {$gender}  </span><br>";
                                echo "<span class='user-info'> {$age} </span><br>";
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


        // function displayRepoSearch($key){

        //     global $connection;
        //     $admin_id = $_SESSION['admin_id'];
                
        //     $query = "SELECT * FROM tbl_constituent where admin_id= '$admin_id' and fname LIKE '%$key%'";
        
        //     $result = mysqli_query($connection, $query);
        
        //         while($row = mysqli_fetch_assoc($result)){
                                            
        //         $id = $row['constituent_id'];
        //         $fname = $row['fname'];
        //         $mname= $row['mname'];
        //         $lname= $row['lname'];
        //         $gender= $row['gender'];
        //         $birthday= $row['birthday'];
        //         $civilstatus= $row['civilstatus'];
        //         $purok= $row['purok'];
        //         $address= $row['address'];
                
    
        //         echo "<div class='widget-content nopadding'>";
        //         echo "<div class='span4'>";
        //             echo"<div class='widget-box' style='margin-right: 5px'>";
        //                 echo "<ul class='recent-posts'>";
        //                     echo "<li>";
        //                         echo "<div class='user-thumb'> <img width='40' height='40' alt='User' src='img/demo/av1.jpg'> </div>";
        //                         echo "<div class='article-post'>";
        //                             echo "<div class='fr'><a href='constituent_profile.php?id={$id}' class='btn btn-primary btn-mini'>View</a> </div> ";
        //                             echo "Constituent Name: {$fname} {$mname} {$lname}<br>";
        //                             echo "<span class='user-info'> Gender: {$gender}  </span><br>";
        //                             echo "<span class='user-info'> Age: 18 </span><br>";
        //                             echo "<br>";
        //                             echo "<p><a href='#'>Address: {$purok} {$address} </a> </p>";
        //                         echo "</div>";
        //                     echo "</li>";
        //                 echo "</ul>";
        //             echo "</div>";
        //         echo "</div>";
        //         echo "</div>";



        //         }
        //     }

            function AddAdmin(){

                global $connection;
            
                if(isset($_POST['save'])){
                        $name = $_POST['name'] ;
                        $username = $_POST['username'] ;
                        $password = $_POST['password'] ;
                        $userlevel = $_POST['userlevel'] ;
                        $admin_id = $_SESSION['admin_id'];
            
                        if ($name == "" || empty($name)){
                            echo '<script language="javascript">';
                                echo 'alert("Fields should not be empty")';
                                echo '</script>';
                        }else{
            
                            $query = "INSERT tbl_users  (name, username, password, user_role, admin_id) VALUES ('$name', '$username', '$password', '$userlevel', '$admin_id')";
            
                            $insert = mysqli_query($connection, $query);
            
                            if (!$insert){
                                die("Failed" . mysqli_error($connection));
                            }else{
                                echo '<script language="javascript">';
                                echo 'alert("User Sucessfully Added")';
                                echo '</script>';

                             

                            }
                        }
            
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

    
                                  header ("Location: print_indigency.php?name=$name&address=$address&gender=$gender");
                                
                                   
                                }
                            }
                
                        }
                    }


                    function AddCertification(){

                        global $connection;
                    
                        if(isset($_POST['finish'])){
                                $constituent_id = $_POST['constituent_id'] ;
                                $purpose = $_POST['purpose'] ;
                                $amount = $_POST['amount'] ;
                                $gender = $_POST['gender'] ;
                                $admin_id = $_SESSION['admin_id'];
                                $age = $_POST['age'] ;
                                $user_id = '' ;

                                    $query = "INSERT tbl_certification  (constituent_id, purpose, admin_id, date_added, user_id, amount_paid) VALUES ('$constituent_id', '$purpose ', '$admin_id', now(), '$user_id', '$amount')";
                    
                                    $insert = mysqli_query($connection, $query);
    
                                    $last_id = mysqli_insert_id($connection);
                    
                                    if (!$insert){
                                        die("Failed" . mysqli_error($connection));
                                    }else{
    
                                      header ("Location: print_certification.php?name=$name&address=$address&gender=$gender&age=$age&purpose=$purpose");
                                      header ("Location: print_receipt.php?name=$name&address=$address&gender=$gender&age=$age&purpose=$purpose");
                                       
                                    }
                                
                    
                            }
                        }

                        function AddCertificationCollection(){

                            global $connection;
                        
                            if(isset($_POST['finish'])){
                                   
                                    $collection_name = "Issuance of Certification" ;
                                    $amount = $_POST['amount'] ;
                                    $user_id = "";
                                    $admin_id = $_SESSION['admin_id'];
       
                                        $query = "INSERT tbl_collection(collection_name, amount_paid, user_id, date_added, admin_id) VALUES ('$collection_name', '$amount', '$user_id', now(), '$admin_id')";
                        
                                        $insert = mysqli_query($connection, $query);
                        
                                        if (!$insert){
                                            die("Failed" . mysqli_error($connection));
                                        }else{
                                            echo '<script language="javascript">';
                                            echo 'alert("User Sucessfully Added")';
                                            echo '</script>';
            
                                        }
                                }
                            }


                    function AddCollection(){

                        global $connection;
                    
                        if(isset($_POST['finish'])){
                               
                                $collection_name = "Issuance of Certificate of Indigency" ;
                                $amount = $_POST['amount'] ;
                                $user_id = "";
                                $admin_id = $_SESSION['admin_id'];
                    
   
                                    $query = "INSERT tbl_collection(collection_name, amount_paid, user_id, date_added, admin_id) VALUES ('$collection_name', '$amount', '$user_id', now(), '$admin_id')";
                    
                                    $insert = mysqli_query($connection, $query);
                    
                                    if (!$insert){
                                        die("Failed" . mysqli_error($connection));
                                    }else{
                                        echo '<script language="javascript">';
                                        echo 'alert("User Sucessfully Added")';
                                        echo '</script>';
        
        
                                    }
                                
                    
                            }
                        }

                        function report(){

                            global $connection;
                            $admin_id = $_SESSION['admin_id'];
                               
                            $query = "SELECT * FROM tbl_collection where admin_id = '$admin_id'";
                        
                            $result = mysqli_query($connection, $query);
                        
                                while($row = mysqli_fetch_assoc($result)){
                                                            
                                $id = $row['collection_id'];
                                $collection_name = $row['collection_name'];
                                $amound_paid= $row['amount_paid'];
                                $date= $row['date_added'];
                                $user_id= $row['user_id'];
                    
                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$collection_name}</td> ";
                                echo "<td>{$amound_paid}</td> ";
                                echo "<td>{$date}</td> ";
                                echo "<td>{$user_id}</td> ";
                                echo "</tr>";
                                }
                            }

                            function DisplayUser(){

                                global $connection;

                                $admin_id = $_SESSION['admin_id'];
                                   
                                $query = "SELECT * FROM tbl_users where admin_id = '$admin_id' ";
                            
                                $result = mysqli_query($connection, $query);
                            
                                    while($row = mysqli_fetch_assoc($result)){
                                                                
                                    $id = $row['user_id'];
                                    $username = $row['username'];
                                    $password= $row['password'];
                                    $user_role= $row['user_role'];
           
                        
                                    echo "<tr>";
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$username}</td> ";
                                    echo "<td>{$password}</td> ";
                                    echo "<td>{$user_role}</td> ";
                        
                                    echo "<td>";
                                        echo "<a href='categories.php?delete={$id}'> Delete ";
                                        echo "<a href='categories.php?edit={$id}'> Edit ";
                                        echo "</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    }
                                }
    
?>