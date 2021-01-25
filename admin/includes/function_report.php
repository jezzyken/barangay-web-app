<?php
    function report($datefrom, $dateto){
        global $connection;
        $admin_id = $_SESSION['admin_id'];
            
        $query = "SELECT * FROM tbl_collection where date_added >= '$datefrom' AND  date_added <= '$dateto' AND admin_id = '$admin_id' ";
    
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
?>