<?php
include_once('../connection/create_connection.php');
include_once('../util/api_request.php');
include_once('../const/api_config.php');

class User extends DatabaseConnection
{

    public static function register($name, $email, $address, $password)
    {
        $connection = DatabaseConnection::createConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO register (name, email, address,password) VALUES ('$name', '$email', '$address','$hashedPassword')";

        if ($connection->query($sql) === TRUE) {

            $body = array(
                "name" => $name,
                "email" => $email,
                "address" => $address
            );

            ApiRequest::postRequest(ApiConfig::BASE_URL,$body);
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        $connection->close();
    }

    public static function login($email, $password)
    {
        $connection = DatabaseConnection::createConnection();
        $user_email = '';
        $user_password = '';



        $sql = "SELECT email,password FROM register  WHERE email='$email'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_email = $row['email'];
                $user_password = $row['password'];
            }
        } else {
            echo "User not found";
        }

        if ($user_email != '') {
            $verify = password_verify($password, $user_password);

            if ($verify) {
                if (User::isOldUser($connection, $email) == true) {
                    User::getAllUsers($connection);
                } else {
                    echo "Login success";
                }
            } else {
                echo "Invalid login";
            }
        }
        $connection->close();
    }

    static function isOldUser($connection, $email)
    {
        $sql = "SELECT email FROM register ORDER BY id ASC LIMIT 1";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $user_email = $row['email'];
                if ($user_email == $email) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            echo "No data found";
            return false;
        }
    }

    static function getAllUsers($connection)
    {
        $sql = "SELECT * FROM register";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo strval($row['name']), " | ", strval($row['email']), " | ", strval($row['address']), " | ", "</br>";
            }
        } else {
            echo "No data found";
            return false;
        }
    }
}
