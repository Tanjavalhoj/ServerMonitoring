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
        
        $explode = explode("\n", $output_dfh_server_3);

        foreach ($explode as $value) {

            // var_dump($value);  
        }
    //SSH data bliver sorteret, og lavet om til et array
        $pattern = "/([\/a-z-0-9]+)[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9%]+)+[ ]+([\/a-z]+)/";

        if (preg_match_all($pattern, $output_dfh_server_3, $matches_dfih_server_3)) {
        
            
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
?>