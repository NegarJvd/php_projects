<?php

//Connect to data base
require_once("database.php");
require_once("functions.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_REQUEST['name']);
    $lastName = test_input($_REQUEST['lastname']);
    $birth = test_input($_REQUEST['birth']);
    $number = test_input($_REQUEST['number']);
    $email = test_input($_REQUEST['email']);
    $address = test_input($_REQUEST['address']);


    if (!empty($name) && !empty($lastName)) {
        echo " <p> Your name is " . $name . " " . $lastName . " <br></p> ";
    }
    if (!empty($birth)) {
        echo "<p> You were born on " . $birth . " <br></p> ";
    }
    if (!empty($number) || !empty($email) || !empty($address)) {
        if (isset($_REQUEST['show'])) {
            echo "<p> Your number is: " . $number . " <br> </p>";
            echo "<p> Your email is: " . $email . " <br> </p>";
            echo "<p> Your address is: " . $address . "</p>";
        } else {
            echo "<p> Your number is:" . "*********" . " <br> </p>";
            echo "<p> Your email is:" . "*********" . " <br> </p>";
            echo "<p> Your address is:" . "*********" . "</p>";
        }
    }

    //save data in data base
    $db = OpenDataBase("php_learning_info");

    /*$query = "INSERT INTO users_info
                    (firstName, lastName, dateOfBirth, phoneNumber , email, address)
                    VALUES ('$name' , '$lastName', '$birth', '$number' , '$email', '$address');";
    $db -> query($query);*/

    $query = "INSERT INTO users_info (firstName, lastName, dateOfBirth, phoneNumber , email, address) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = $db -> prepare($query);
    $stmt -> bind_param("ssssss", $firstName, $lastName, $dateOfBirth, $phoneNumber , $email, $address);

    $firstName = $name;
    $lastName = $lastName;
    $dateOfBirth = $birth;
    $phoneNumber = $number;
    $email = $email;
    $address = $address;
    $stmt -> execute();
    CloseDataBase($db);
}
?>