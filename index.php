<?php
        $servername = "54.154.31.209";
        $username = "tav";
        $password = "U88lPRF4R6VjyTfk";
        $dbnamee = "tav";

        $conn = new mysqli($servername, $username, $password, $dbnamee);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
