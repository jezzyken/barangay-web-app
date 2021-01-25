<?php

//insert.php

session_start();

$connect = new PDO('mysql:host=localhost;dbname=barangay', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO tbl_events 
 (title, start_event, end_event, admin_id) 
 VALUES (:title, :start_event, :end_event, :admin_id)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':admin_id' => $_SESSION['admin_id']
  )
 );
}


?>