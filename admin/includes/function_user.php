<?php

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