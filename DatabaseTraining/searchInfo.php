<?php

//Connect to data base
require_once("database.php");
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $searchBy = test_input($_GET['searchBy']);
    $value = test_input($_GET['value']);

    if ($searchBy != "null") {
        $sdb = OpenDataBase("php_learning_info");

        $query = "SELECT * FROM users_info WHERE {$searchBy}='{$value}'";
        $result = $sdb->query($query);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Of Birth</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                    <tr>";
            while ($row = $result->fetch_assoc()) {

                echo "<td>{$row["firstName"]}</td>
                  <td>{$row["lastName"]}</td>
                  <td>{$row["dateOfBirth"]}</td>
                  <td>{$row["phoneNumber"]}</td>
                  <td>{$row["email"]}</td>
                  <td>{$row["address"]}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "NOT FOUND! ";
        }
        CloseDataBase($sdb);
    }else{
        echo "<b>Please Select an item!</b>";
    }
}
?>