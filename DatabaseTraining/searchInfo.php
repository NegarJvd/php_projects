<?php

//Connect to data base
require_once("database.php");
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    if (isset($_REQUEST['sFName']) || isset($_REQUEST['sLName']) || isset($_REQUEST['sBirth']) || isset($_REQUEST['sNumber']) || isset($_REQUEST['sEmail']) || isset($_REQUEST['sAddress']) ) {

        $sFName = test_input($_REQUEST['sFName']);
        $sLastName = test_input($_REQUEST['sLName']);
        $sBirth = test_input($_REQUEST['sBirth']);
        $sNumber = test_input($_REQUEST['sNumber']);
        $sEmail = test_input($_REQUEST['sEmail']);
        $sAddress = test_input($_REQUEST['sAddress']);

        //search data in database
        $sdb = OpenDataBase("php_learning_info");
        $q = "SELECT * FROM users_info WHERE ";

        //by first name
        if ($sFName != null){
            $q .= "firstName='$sFName'";
        }

        //by last name
        elseif ($sLastName != null){
            $q .= "lastName='$sLastName'";
        }

        //by date of birth
        elseif ($sBirth != null){
            $q .= "dateOfBirth='$sBirth'";
        }

        //by phone number
        elseif ($sNumber != null){
            $q .= "phoneNumber='$sNumber'";
        }

        //by email
        elseif ($sEmail != null){
            $q .= "email='$sEmail'";
        }

        //by address
        elseif ($sAddress != null){
            $q .= "address='$sAddress'";
        }

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
}
?>