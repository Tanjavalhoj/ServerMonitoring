<?php
$server[0]["name"] = "CRM Yourpay";
$server[0]["ip"] = "";
$server[0]["user"] = "serveradm";
$server[0]["pass"] = "";
//-------------------------------- Server 2 ------------------------------------

        $connection_server_2 = ssh2_connect('', 22);
        ssh2_auth_password($connection_server_2, 'serveradm', '');

        $stream_dfih_server_2 = ssh2_exec($connection_server_2, 'df -ih');
        stream_set_blocking($stream_dfih_server_2, true);
        $output_dfih_server_2 = stream_get_contents($stream_dfih_server_2);

        $stream_dfh_server_2 = ssh2_exec($connection_server_2, 'df -h');
        stream_set_blocking($stream_dfh_server_2, true);
        $output_dfh_server_2 = stream_get_contents($stream_dfh_server_2);
?>