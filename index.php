<?php
        $servername = "";
        $username = "";
        $password = "";
        $dbnamee = "";

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
        
        $data = '100%';
        include 'server_3.php';

        //------------------ Get data from DB dfih  Server 3 ---------------------------        
        $table_dfih_server_3 = "SELECT * FROM ssh_server_3_dfih";
        if ($result_dfih_server_3 = mysqli_query($conn, $table_dfih_server_3)) {
            if (mysqli_num_rows($result_dfih_server_3) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>id_server_3</th>";
                echo "<th>Filesystem</th>";
                echo "<th>Inodes</th>";
                echo "<th>IUsed</th>";
                echo "<th>IFree</th>";
                echo "<th>IUsed_Procent</th>";
                echo "<th>Mounted_on</th>";
                echo "<th>reg_date</th>";
                echo "</tr>";
                while ($row_dfih_server_3 = mysqli_fetch_array($result_dfih_server_3)) {
                    echo "<tr>";
                    echo "<td>" . $row_dfih_server_3['id_server_3'] . "</td>";
                    echo "<td>" . $row_dfih_server_3['Filesystem'] . "</td>";
                    echo "<td>" . $row_dfih_server_3['Inodes'] . "</td>";
                    echo "<td>" . $row_dfih_server_3['IUsed'] . "</td>";
                    echo "<td>" . $row_dfih_server_3['IFree'] . "</td>";

                    //Den tjekker om data'en matcher 100% og hvis den gør, bliver feltet farvet rødt
                     if ($row_dfih_server_3['IUsed_Procent']==$data) {
                        echo "<td style='background-color: #FF0000;'>" . $row_dfih_server_3['IUsed_Procent'] . "</td>";
                    } else {
                        echo "<td>" . $row_dfih_server_3['IUsed_Procent'] . "</td>";
                    }
                    //echo "<td>" . $row_dfih_server_3['IUsed_Procent'] . "</td>";
                    echo "<td>" . $row_dfih_server_3['Mounted_on'] . "</td>";
                    echo "<td>" . $row_dfih_server_3['reg_date'] . "</td>";
                    echo "</tr>";
                }
                echo "<h1>Server 3</h1>";
                echo "<h2>SSH df -ih</h2>";
                echo "</table>";
                mysqli_free_result($result_dfih_server_3) . "<br>" . "<br>";
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not execute $table_dfih_server_3: " . mysqli_error($conn);
        }

//------------------ Get data from DB dfh Server 3 -----------------------------          
        $table_dfh_server_3 = "SELECT * FROM ssh_server_3_dfh";
        if ($result_dfh_server_3 = mysqli_query($conn, $table_dfh_server_3)) {
            if (mysqli_num_rows($result_dfh_server_3) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>id_server_3</th>";
                echo "<th>Filesystem</th>";
                echo "<th>Size</th>";
                echo "<th>Used</th>";
                echo "<th>Avail</th>";
                echo "<th>Used_Procent</th>";
                echo "<th>Mounted_on</th>";
                echo "<th>reg_date</th>";
                echo "</tr>";
                while ($row_dfh_server_3 = mysqli_fetch_array($result_dfh_server_3)) {
                    echo "<tr>";
                    echo "<td>" . $row_dfh_server_3['id_server_3'] . "</td>";
                    echo "<td>" . $row_dfh_server_3['Filesystem'] . "</td>";
                    echo "<td>" . $row_dfh_server_3['Size'] . "</td>";
                    echo "<td>" . $row_dfh_server_3['Used'] . "</td>";
                    echo "<td>" . $row_dfh_server_3['Avail'] . "</td>";

                    //Den tjekker om data'en matcher 100% og hvis den gør, bliver feltet farvet rødt
                     if ($row_dfh_server_3['Used_Procent']==$data) {
                        echo "<td style='background-color: #FF0000;'>" . $row_dfh_server_3['Used_Procent'] . "</td>";
                    } else {
                        echo "<td>" . $row_dfh_server_3['Used_Procent'] . "</td>";
                    }
                    //echo "<td>" . $row_dfh_server_3['Used_Procent'] . "</td>";
                    echo "<td>" . $row_dfh_server_3['Mounted_on'] . "</td>";
                    echo "<td>" . $row_dfh_server_3['reg_date'] . "</td>";
                    echo "</tr>";
                }
                echo "<h2>SSH df -h</h2>";
                echo "</table>";
                mysqli_free_result($result_dfh_server_3);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not execute $table_dfh_server_3: " . mysqli_error($conn);
        }

//---------------------------- Close Connection --------------------------------
        $conn->close();
//------------------------------------------------------------------------------

        ?>
    </body>
</html>
