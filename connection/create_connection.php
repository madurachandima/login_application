<?php
class DatabaseConnection
{
function  createConnection()
    {

        $servername = "livedb.c91lzp1jkx3p.us-east-2.rds.amazonaws.com:3306";
        $username = "root";
        $password = "mysqldbroot";
        $db = "test_db";

        $conn =  mysqli_connect($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";

        return $conn;
    }


}
