<?php 
// include database file
include('database.php');

$title = $_POST['title'];
$type = $_POST['type'];
$priority = $_POST['priority'];
$status = $_POST['status'];
$date = $_POST['date'];
$description = $_POST['description'];

$conn = new mysqli('localhost', 'root', '', 'youcodescrumboard'); 
if($conn->connect_eror){
    die('Connection Failed : ' .$conn->connect_eror);

}else{
    $stmt = $conn->prepare("insert into registration(title, type, priority, status, date,description)
     value(?, ?, ?, ?, ?, ,)");
     $stmt->bind_param("ssssis", $title, $type, $priority, $status, $date, $description);
     $stmt->execute();
     echo "registration successfully...";
     $stmt->close();
     $conn->close();
}
