<?php
include('connectDB.php');
$db = new DBObject();
$conn = $db->getConnection();

$table = "";

$sql = "SELECT * FROM evento";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        $table .= "<tr><td>" . $row["ID"] . "</td><td>" . $row["Nome"] . "</td><td>" . $row["Descricao"] . "</td><td>" . $row["HoraComeco"] . "</td><td>" . $row["HoraTermino"] . "</td></tr>";
    }
} else {
    $table = "there's nothing here.";
}

echo $table;

$conn->close();
