<?php

include_once('../util/util.php');
include_once('../logic/user.php');

if (isset($_POST["btn_register"])) {


    $name = Util::return_input($_POST["name"]);
    $email = Util::return_input($_POST["email"]);
    $address = Util::return_input($_POST["address"]);
    $password = Util::return_input($_POST["password"]);
    
    USer::register($name, $email, $address, $password);

}
