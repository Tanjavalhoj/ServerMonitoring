<?php
$server[0]["name"] = "CRM Yourpay";
$server[0]["ip"] = "";
$server[0]["user"] = "";
$server[0]["pass"] = "";
//-------------------------------- Server 2 ------------------------------------

        $connection_server_2 = ssh2_connect('', 22);
        ssh2_auth_password($connection_server_2, '', '');

        $stream_dfih_server_2 = ssh2_exec($connection_server_2, 'df -ih');
        stream_set_blocking($stream_dfih_server_2, true);
        $output_dfih_server_2 = stream_get_contents($stream_dfih_server_2);

        $stream_dfh_server_2 = ssh2_exec($connection_server_2, 'df -h');
        stream_set_blocking($stream_dfh_server_2, true);
        $output_dfh_server_2 = stream_get_contents($stream_dfh_server_2);
        
//          echo "<h2>SSH df -ih</h2>";
//          echo $output_dfih_server_2;
//          echo "<h2>SSH df -h</h2>";
//          echo $output_dfh_server_2;
        
//------------------------------ dfih ------------------------------------------
      
        $explode = explode("\n", $output_dfih_server_2);

        foreach ($explode as $value) {

            // var_dump($value);  
        }
        //SSH data bliver sorteret, og lavet om til et array
        $pattern = "/([\/a-z-0-9]+)[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9\.(A-Z)]+)+[ ]+([0-9%]+)+[ ]+([\/a-z]+)/";

        if (preg_match_all($pattern, $output_dfih_server_2, $matches_dfih)) {
            
            //echo 'Matches found: ' . count($matches_dfih) . ' !';
            //print_r($matches_dfih[0]);
            
        } else {
            echo "No matches";
        }
//-----------------------------------dfh----------------------------------------

        $explode_2 = explode("\n", $output_dfh_server_2);

        foreach ($explode_2 as $value_2) {

            // var_dump($value_2);  
        }

        if (preg_match_all($pattern, $output_dfh_server_2, $matches_dfh)) {
            
            //echo 'Matches found: ' . count($matches_dfh) . ' !';
            //print_r($matches_dfh[0]);
            
        } else {
            echo "No matches";
        }
//---------------------------- Db Connection -----------------------------------

        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }        
        
        
        
        
?>