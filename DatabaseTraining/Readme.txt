By running these files, you can retrieve information from the user and save it to the database. Then in the search field you can search in the entered information. And in the update section, update that information and in the removal section, delete them.

To run these files, we need to connect to the database. To connect, create a file named "database.php" and enter the following code in it. Make sure you personalize your username and password.

<?php
function OpenDataBase($db){
    $dbhost = "localhost";
    $dbuser = "***";
    $dbpass = "***";
    $data = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $data -> error);
    
    return $data;
    }
    
function CloseDataBase($data){
    $data -> close();
}
?>

Then create a database named * and inside it a table named *.
User information will be stored in this table.
You can change these names, just note that you can also change them within the relevant files.