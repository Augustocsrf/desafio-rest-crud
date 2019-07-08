<?php
include('connectDB.php');
$db = new DBObject();
$conn = $db->getConnection();

$id = file_get_contents("php://input");

$response = "";

$sql = "SELECT * FROM evento WHERE ID = '{$id}'";
$result = $conn->query($sql);    
$rows = mysqli_num_rows($result);

if($rows == 1){
    $sqlDelete = "DELETE FROM evento WHERE ID='{$id}'";
    $resultDelete = $conn->query($sqlDelete);

    $response = "<p class='alert alert-success text-center'> Elemento apagado com successo</p>";
} else {
    $response = "<p class='alert alert-danger text-center'> Elemento não removido devido a algum problema </p>";
}

echo $response;
?>