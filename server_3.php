<?php
$server[0]["name"] = "CRM Yourpay";
$server[0]["ip"] = "";
$server[0]["user"] = "serveradm";
$server[0]["pass"] = "";
//-------------------------------- Server 3 ------------------------------------

    $connection_server_3 = ssh2_connect('', 22);
    ssh2_auth_password($connection_server_3, 'serveradm', '');

    $stream_dfih_server_3 = ssh2_exec($connection_server_3, 'df -ih');
    stream_set_blocking($stream_dfih_server_3, true);
    $output_dfih_server_3 = stream_get_contents($stream_dfih_server_3);

    $stream_dfh_server_3 = ssh2_exec($connection_server_3, 'df -h');
    stream_set_blocking($stream_dfh_server_3, true);
    $output_dfh_server_3 = stream_get_contents($stream_dfh_server_3);



//          echo "<h2>SSH df -ih</h2>";
//          echo $output_dfih_server_3;
//          echo "<h2>SSH df -h</h2>";
//          echo $output_dfh_server_3;

//-------------------------- Sorting --- dfih ----------------------------------
        
    $explode = explode("\n", $output_dfih_server_3);

    foreach ($explode as $value) {

        // var_dump($value);  
    }
//SSH data bliver sorteret, og lavet om til et array
    $pattern = "/([\/a-z-0-9]+)[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9%]+)+[ ]+([\/a-z]+)/";

    if (preg_match_all($pattern, $output_dfih_server_3, $matches_dfih_server_3)) {


    } else {
        echo "No matches";
    } 
        
//--------------------------Sorting --- dfh ------------------------------------

    $explode_2 = explode("\n", $output_dfh_server_3);

    foreach ($explode_2 as $value_2) {

        // var_dump($value_2);  
    }

    if (preg_match_all($pattern, $output_dfh_server_3, $matches_dfh)) {
        //echo 'Matches found: ' . count($matches_dfh) . ' !';
        //print_r($matches_dfh[0]);
    } else {
        echo "No matches";
    }
        
//---------------------------- Db Connection -----------------------------------
        
$servername = "54.154.31.209";
$username = "tav";
$password = "U88lPRF4R6VjyTfk";
$dbnamee = "tav";

$conn = new mysqli($servername, $username, $password, $dbnamee);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}        

//------------------------ Database --- for --- dfih ---------------------------

    //Ctreate table for dfih
            $createtable_dfih_server_3 = "CREATE TABLE IF NOT EXISTS ssh_server_3_dfih(id_server_3 INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"
                    . "Filesystem VARCHAR(30) NOT NULL,"
                    . "Inodes VARCHAR(10) NOT NULL,"
                    . "IUsed VARCHAR(10) NOT NULL,"
                    . "IFree VARCHAR(10) NOT NULL,"
                    . "IUsed_Procent VARCHAR(10) NOT NULL,"
                    . "Mounted_on VARCHAR(10) NOT NULL,"
                    . "reg_date TIMESTAMP)";

            if ($conn->query($createtable_dfih_server_3) === TRUE) {
                //  echo 'SUCCESS! Table created!';
            } else {
                echo 'Error: Could not create table: ' . $conn->error;
            }

    // Data bliver insat i ssh_dfih databasen
    //Skærer første element i arrayët altså [0] så plads [1] bliver til [0]
            $sliced = array_slice($matches_dfih_server_3, 1);
    //var_dump($sliced);
            $count_array_server_3 = count($matches_dfih_server_3[0]);

    //  var_dump("count" . $count_array);
            $i_dfih = 0;
            while ($i_dfih < $count_array_server_3) {

                $sql_dfih = "INSERT INTO ssh_server_3_dfih (`Filesystem`,`Inodes`,`IUsed`,`IFree`,`IUsed_Procent`,`Mounted_on`)"
                        . " VALUES ('" . $sliced[0][$i_dfih] . "',"
                        . " '" . $sliced[1][$i_dfih] . "',"
                        . " '" . $sliced[2][$i_dfih] . "',"
                        . " '" . $sliced[3][$i_dfih] . "',"
                        . " '" . $sliced[4][$i_dfih] . "',"
                        . " '" . $sliced[5][$i_dfih] . "'"
                        . ")";
                if ($conn->query($sql_dfih) === TRUE) {
                    //  echo 'Yay a new record created successfully';
                } else {
                    echo 'Error: ' . $sql_dfih . $conn->error;
                }

                $i_dfih++;
            }        
//---------------- Database ------- dfh ----------------------------------------

//Cteate table for dfh
        $createtable_dfh = "CREATE TABLE IF NOT EXISTS ssh_server_3_dfh(id_server_3 INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"
                . "Filesystem VARCHAR(30) NOT NULL,"
                . "Size VARCHAR(10) NOT NULL,"
                . "Used VARCHAR(10) NOT NULL,"
                . "Avail VARCHAR(10) NOT NULL,"
                . "Used_Procent VARCHAR(10) NOT NULL,"
                . "Mounted_on VARCHAR(10) NOT NULL,"
                . "reg_date TIMESTAMP)";

        if (mysqli_query($conn, $createtable_dfh)) {
            // echo 'SUCCESS! Table created!';
        } else {
            //  echo 'Error: Could not create table' . mysqli_errno($conn);
        }

// Data bliver insat i ssh_dfih databasen
        $sliced_dfh = array_slice($matches_dfh, 1);
//var_dump($sliced);
        $count_array_dfh = count($matches_dfh[0]);
//var_dump("count" . $count_array);
        $i_dfh = 0;

        while ($i_dfh < $count_array_dfh) {

            $sql_dfh = "INSERT INTO ssh_server_3_dfh (`Filesystem`,`Size`,`Used`,`Avail`,`Used_Procent`,`Mounted_on`)"
                    . " VALUES ('" . $sliced_dfh[0][$i_dfh] . "',"
                    . " '" . $sliced_dfh[1][$i_dfh] . "',"
                    . " '" . $sliced_dfh[2][$i_dfh] . "',"
                    . " '" . $sliced_dfh[3][$i_dfh] . "',"
                    . " '" . $sliced_dfh[4][$i_dfh] . "',"
                    . " '" . $sliced_dfh[5][$i_dfh] . "'"
                    . ")";
            if ($conn->query($sql_dfh) === TRUE) {
                // echo 'Yay a new record created successfully';
            } else {
                echo 'Error: ' . $sql_dfh . $conn->error;
            }

            $i_dfh++;
        }        
?>