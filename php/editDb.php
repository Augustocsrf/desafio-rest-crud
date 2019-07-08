<?php
include('connectDB.php');
$db = new DBObject();
$conn = $db->getConnection();

$cntnt = file_get_contents("php://input");
$updateValues = json_decode($cntnt);

$idIdentifier = $updateValues->idIdentify;
$newName = $updateValues->newName;
$newEventDescr = $updateValues->newEventDescr;
$newStart = $updateValues->newStart;
$newEnd = $updateValues->newEnd;

$response = "";
$responseName = "";
$responseDescr = "";
$responseStart = "";
$responseEnd = "";

$sql = "SELECT * FROM evento WHERE ID = '{$idIdentifier}'";
$result = $conn->query($sql);    
$rows = mysqli_num_rows($result);

if($rows == 1){
    //Define whether change Name
    if (!empty($newName)) {
        $newNameSql = "UPDATE evento SET Nome='{$newName}' WHERE ID={$idIdentifier}";
        $responseName = "<br>Nome alterado para " . $newName;
        $conn->query($newNameSql);
    } 

    //Define whether change Descript
    if (!empty($newEventDescr)) {
        $newEventDescrSql = "UPDATE evento SET Descricao='{$newEventDescr}' WHERE ID={$idIdentifier}";
        $responseDescr = "<br>Descrição alterada para " . $newEventDescr;
        $conn->query($newEventDescrSql);
    } 

    //Define whether change Start Time
    if (!empty($newStart)) {
        $newStartSql = "UPDATE evento SET HoraComeco='{$newStart}' WHERE ID={$idIdentifier}";
        $conn->query($newStartSql);
        $responseStart = "<br>Começo alterado para " . $newStart;
    }

    //Define whether change Start Time
    if (!empty($newEnd)) {
        $newEndSql = "UPDATE evento SET HoraTermino='{$newEnd}' WHERE ID={$idIdentifier}";
        $conn->query($newEndSql);
        $responseEnd = "<br>Término alterado para " . $newEnd;
    }

    $response = "<p class='alert alert-success text-center'> Elemento Alterado com successo " . $responseName . $responseDescr . $responseStart . $responseEnd . "</p>";
} else {
    $response = "<p class='alert alert-danger text-center'> Elemento não removido devido a algum problema</p>";
}

echo $response;