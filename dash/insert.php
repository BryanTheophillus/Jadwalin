<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }
?>

<?php

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (user,title, start_event, end_event,color) 
 VALUES (:user,:title, :start_event, :end_event,:color)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    ':user' => $_SESSION["username"],
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':color' => $_POST['color']
  )
 );
 header('Location: index.php');

}


?>