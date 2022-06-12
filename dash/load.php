<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }
?>

<?php

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

$data = array();

$query = "SELECT * FROM events WHERE user='".$_SESSION["username"]."' ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'user' => $row["user"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
  'color'   => $row["color"]
 );
}

echo json_encode($data);

?>