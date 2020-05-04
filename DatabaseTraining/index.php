<!DOCTYPE html>

<!--Functions-->
<?php require_once ("functions.php");?>

<html>
    <head>
        <meta charset= "utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Database Training</title>
    </head>
    <body>

        <div><p>
            <h1 style="text-align: center;">Getting Information</h1>
            <br>
            <form method="post" action="gettingInfo.php">
                <label> Name: </label>
                <br>
                <span><input type="text" name="name" placeholder="e.g. Negar"></span>
                <br><br>

                <label> Lastname: </label>
                <br>
                <span><input type="text" name="lastname" placeholder="e.g. Javadzadeh"></span>
                <br><br>

                <label> Date Of Birth: </label>
                <br>
                <span><input type="date" name="birth"></span>
                <br><br>

                <label> Number: </label>
                <br>
                <span><input type="number" name="number" placeholder="e.g. 0914......."></span>
                <br><br>

                <label> Email: </label>
                <br>
                <span><input type="email" name="email" placeholder="e.g. example@ooooo.com"></span>
                <br><br>

                <label> Address: </label>
                <br>
                <span><input type="text" name="address" placeholder="Yor Address..."></span>
                <br><br><br><br>

                <label class="center"> Show number & email & address</label><input name="show" type="checkbox">
                <input type="submit">
            </form>
        </p></div>

<!----------------------------------------------------------------------------------------------------------------------->

        <div><p>
            <h1 style="text-align: center;">Search For Information</h1>
            <h5 style="text-align: center; color: red">Just fill in one of the fields below.</h5>
            <form method="get" action="searchInfo.php">
                <label>Search by first name: </label>
                <br>
                <span><input type="text" name="sFName"></span>
                <br><br>

                <label>Search by last name: </label>
                <br>
                <span><input type="text" name="sLName"></span>
                <br><br>

                <label>Search by date of birth: </label>
                <br>
                <span><input type="date" name="sBirth"></span>
                <br><br>

                <label>Search by number: </label>
                <br>
                <span><input type="number" name="sNumber"></span>
                <br><br>

                <label>Search by email: </label>
                <br>
                <span><input type="email" name="sEmail"></span>
                <br><br>

                <label>Search by address: </label>
                <br>
                <span><input type="text" name="sAddress"></span>
                <input type="submit">
            </form>
         </p></div>

<!----------------------------------------------------------------------------------------------------------------------->

        <div><p>
            <h1 style="text-align: center;">Update Yor Information</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <p>Enter your email for update information.
                    <input type="email" name="confirmEmail">
                </p>
                <p>
                    Name <input type="checkbox" name="cuFName">
                    Last name <input type="checkbox" name="cuLName">
                    Date of birth <input type="checkbox" name="cuBirth">
                    Number <input type="checkbox" name="cuNumber">
                    Email <input type="checkbox" name="cuEmail">
                    Address <input type="checkbox" name="cuAddress">
                </p>
                <input type="submit">
                <br><br>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                if ($_REQUEST['confirmEmail'] != null ) {

                    $confirmEmail = test_input($_REQUEST['confirmEmail']);

                    echo " <form method=\"post\" action=\"updateInfo.php\">
                           <h2 style=\"text-align: center; color: red\">Enter your new information.</h2>
                           <input type='hidden'  name='confirm' value='$confirmEmail'>";

                    if (isset($_REQUEST['cuFName'])){
                        echo "<label> Name: </label>
                              <br>
                              <span><input type=\"text\" name=\"uName\" placeholder=\"e.g. Negar\"></span>
                              <br><br>";
                    }

                    if (isset($_REQUEST['cuLName'])){
                        echo "<label> Lastname: </label>
                              <br>
                              <span><input type=\"text\" name=\"uLastname\" placeholder=\"e.g. Javadzadeh\"></span>
                              <br><br>";
                    }

                    if (isset($_REQUEST['cuBirth'])){
                        echo "<label> Date Of Birth: </label>
                              <br>
                              <span><input type=\"date\" name=\"uBirth\"></span>
                              <br><br>";
                    }

                    if (isset($_REQUEST['cuNumber'])){
                        echo "<label> Number: </label>
                              <br>
                              <span><input type=\"number\" name=\"uNumber\" placeholder=\"e.g. 0914.......\"></span>
                              <br><br>";
                    }

                    if (isset($_REQUEST['cuEmail'])){
                        echo "<label> Email: </label>
                              <br>
                              <span><input type=\"email\" name=\"uEmail\" placeholder=\"e.g. example@ooooo.com\"></span>
                              <br><br>";
                    }

                    if (isset($_REQUEST['cuAddress'])){
                        echo "<label> Address: </label>
                              <br>
                              <span><input type=\"text\" name=\"uAddress\" placeholder=\"Yor Address...\"></span>
                              <br><br>";
                    }

                    echo "<input type=\"submit\"></form>";
                }
                else{
                    echo "<b>Please fill in the field above!</b>";
                }
            }
            ?>
        </p></div>

<!----------------------------------------------------------------------------------------------------------------------->
        <div><p>
            <h1 style="text-align: center;">Delete Yor Information</h1>
            <form method="post" action="deleteInfo.php">
                <p>Enter your email for delete information.
                    <input type="email" name="deleteEmail">
                </p>
                <input type="submit">
                <br><br>
            </form>
        </p></div>

    </body>
</html>


