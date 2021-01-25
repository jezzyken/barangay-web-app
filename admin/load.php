<?php

//load.php

session_start();

$admin_id = $_SESSION['admin_id'];

$connect = new PDO('mysql:host=localhost;dbname=barangay', 'root', '');

$data = array();

$query = "SELECT * FROM tbl_events where admin_id = '$admin_id' ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>