<?php

//Connect to data base
require_once("database.php");
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if ($_REQUEST['deleteEmail'] != null ) {

        $dEmail = test_input($_REQUEST['deleteEmail']);

        //Delete information in database
        $ddb = OpenDataBase("php_learning_info");

        //Check email validate
        $r = $ddb->query("SELECT email FROM users_info WHERE email='$dEmail'");

        if ($r->num_rows > 0) {
            $query = "DELETE FROM users_info WHERE email='$dEmail'";
            $result = $ddb->query($query);
            if ($result === true) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $ddb->error;
            }
        }
        else{
            echo "Invalid email. <b>Please enter a valid email!</b>";
        }

        CloseDataBase($ddb);
    }
    else{
        echo "<b>Please fill the field!</b>";
    }
}
?>