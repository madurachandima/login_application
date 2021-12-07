<?php

include_once('../util/util.php');
include_once('../logic/user.php');

if (isset($_POST["btn_login"])) {


    $email = Util::return_input($_POST["email"]);
    $password = Util::return_input($_POST["password"]);

    USer::login($email, $password);
}
