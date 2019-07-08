<?php
include('connectDB.php');

$db = new DBObject();
$conn = $db->getConnection();

$var = file_get_contents("php://input");
$logInValues = json_decode($var);
$username = $logInValues->login;
$pass = $logInValues->password;

$username = stripcslashes($username);
$pass = stripcslashes($pass);

$array = array();

$sql = "SELECT * FROM login WHERE Username = '{$username}' AND Senha = '{$pass}'";
$result = $conn->query($sql);
$rows = mysqli_num_rows($result);

if ($rows == 1) {
  $array["failed"] = false;
} else {
  $array["failed"] = true;
}

echo json_encode($array);
