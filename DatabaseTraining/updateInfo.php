<?php

//Connect to data base
require_once("database.php");
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $confirmEmail = test_input($_REQUEST['confirm']);

    //Update information in database
    $udb = OpenDataBase("php_learning_info");

    //Check email validate
    $r = $udb -> query("SELECT email FROM users_info WHERE email='$confirmEmail'");

    if ($r ->num_rows > 0) {
        $query = "UPDATE users_info SET ";

        if (isset($_REQUEST['uName'])) {
            $uName = test_input($_REQUEST['uName']);
            $query .= "firstName='$uName'";
        }
        if (isset($_REQUEST['uLastname'])) {
            $uLastName = test_input($_REQUEST['uLastname']);
            $query .= "lastName='$uLastName'";
        }
        if (isset($_REQUEST['uBirth'])) {
            $uBirth = test_input($_REQUEST['uBirth']);
            $query .= "dateOfBirth='$uBirth'";
        }
        if (isset($_REQUEST['uNumber'])) {
            $uNumber = test_input($_REQUEST['uNumber']);
            $query .= "phoneNumber='$uNumber'";
        }
        if (isset($_REQUEST['uEmail'])) {
            $uEmail = test_input($_REQUEST['uEmail']);
            $query .= "email='$uEmail'";
        }
        if (isset($_REQUEST['uAddress'])) {
            $uAddress = test_input($_REQUEST['uAddress']);
            $query .= "address='$uAddress'";
        }

        $query .= " WHERE email='$confirmEmail'";

        $result = $udb->query($query);

        if ($result === true) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $udb->error;
        }
    }
    else{
        echo "Invalid email. <b>Please enter a valid email!</b>";
    }

    CloseDataBase($udb);
}
?>