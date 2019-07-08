<?php
include('connectDB.php');
$db = new DBObject();
$conn = $db->getConnection();

$cntnt = file_get_contents("php://input");
$updateValues = json_decode($cntnt);

$newName = $updateValues->newName;
$newEventDescr = $updateValues->newEventDescr;
$newStart = $updateValues->newStart;
$newEnd = $updateValues->newEnd;

$sql = "INSERT into `evento`(`Nome`, `Descricao`, `HoraComeco`, `HoraTermino`) VALUES ('$newName', '$newEventDescr', '$newStart', '$newEnd')";

if((!empty($newName)) && (!empty($newEventDescr))){
    //Caso o nome e a descrição tenham valor, continuar, se não, retornar que pelo menos esses valores são necessários
    $result = $conn->query($sql);    

    if($result){
        $response = "<p class='alert alert-success text-center'> Elemento adicionado com successo </p>";
    } else {
        $response = "<p class='alert alert-danger text-center'> Elemento não adicionado devido a algum problema</p>";
    }
} else {
    $response = "<p class='alert alert-danger text-center'> Elemento não adicionado devido a falta de nome e/ou descrição</p>";
}






echo $response;