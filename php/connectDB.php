<?php
class DBObject{
    var $conn;

    function getConnection(){
        $con = mysqli_connect("localhost", "root", "", "db-evento");         
                    
        if ($con -> connect_error){
            die("Connection failed" . $con -> connect_error);
        }

        $this->conn = $con;

        return $this->conn;
    }
}
?>