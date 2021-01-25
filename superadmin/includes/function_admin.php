<?php 

function AddAdminUser(){

    global $connection;

    if(isset($_POST['save'])){
            $barangay_name = $_POST['barangay'] ;
            $name = $_POST['name'] ;
            $username = $_POST['username'] ;
            $password = $_POST['password'] ;
            $user_role = $_POST['user_role'] ;


                $query = "INSERT tbl_admin (barangay_name, name, username, password, user_role) VALUES ('$barangay_name', '$name', '$username', '$password', '$user_role')";

                $insert = mysqli_query($connection, $query);

                if (!$insert){
                    die("Failed" . mysqli_error($connection));
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("Admin User Sucessfully Added")';
                    echo '</script>';
                }
            

        }
    }


    function display(){

        global $connection;

        $query = "SELECT * FROM tbl_admin";
    
        $result = mysqli_query($connection, $query);
    
            while($row = mysqli_fetch_assoc($result)){
                                        
            $admin_id = $row['admin_id'];
            $barangay_name = $row['barangay_name'];
            $name= $row['name'];
            $username= $row['username'];
            $password= $row['password'];

            echo "<tr>";
           // echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='{$admin_id}'></td>";
            echo "<td>{$admin_id}</td>";
            echo "<td>{$barangay_name}</td>";
            echo "<td>{$name}</td> ";
            echo "<td>{$username}</td> ";
            echo "<td>{$password}</td> ";
   
            echo "<td>";
                // echo "<a href='constituent_list.php?delete={$id}'> Delete ";
                echo "<a rel='{$admin_id}' href='javascript:void(0)' class='delete_link'> Delete ";

                echo "<a href='?edit={$admin_id}'> Edit ";
            
            echo "</td>";
            echo "</tr>";
            }
        }


?>