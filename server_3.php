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
        
        
?>