<?php
$server[0]["name"] = "CRM Yourpay";
$server[0]["ip"] = ""; //
$server[0]["user"] = "serveradm";
$server[0]["pass"] = "";
//-------------------------------- Server 1 ------------------------------------
$connection_server_1 = ssh2_connect('', 22);
        ssh2_auth_password($connection_server_1, 'serveradm', '');

        $stream_dfih_server_1 = ssh2_exec($connection_server_1, 'df -ih');
        stream_set_blocking($stream_dfih_server_1, true);
        $output_dfih_server_1 = stream_get_contents($stream_dfih_server_1);

        $stream_dfh_server_1 = ssh2_exec($connection_server_1, 'df -h');
        stream_set_blocking($stream_dfh_server_1, true);
        $output_dfh_server_1 = stream_get_contents($stream_dfh_server_1);
        
//            echo "<h2>SSH df -ih</h2>";
//            echo $output_dfih_server_1;
//            echo "<h2>SSH df -h</h2>";
//            echo $output_dfh_server_1;
        
        
        
        
        
?>