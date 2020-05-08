<?php

//Connect to data base
require_once("database.php");
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if ($_REQUEST['select'] != "null"){
        $searchBy = $_REQUEST['select'];
        $value = test_input($_REQUEST['search']);

        //search data in database
        $sdb = OpenDataBase("php_learning_info");
        $q = "SELECT * FROM users_info WHERE " . $searchBy . "='" . $value ."'" ;
        $result = $sdb->query($q);

        if ($result -> num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                //echo $row["id"]. ") ";
                echo $row["firstName"]. " " . $row["lastName"] . "<br>" . $row["dateOfBirth"] . "<br>" . $row["phoneNumber"] . "<br>" . $row["email"] . "<br>" . $row["address"];
                echo "<br>";
            }
        }else{
            echo "NOT FOUND! ";
        }
        CloseDataBase($sdb);
    }
    else{
        echo "<b>Please Select an item!</b>";
    }
}
?>