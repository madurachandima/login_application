<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Register</h2>
    <form action="../controller/login_controller.php" method="post">
        <label for="email">Email : </label>
        <input type="text" id="email" name="email">
        <br />
        <label for="password">Password : </label>
        <input type="text" id="password" name="password">
        <br /> <br />
        <input type="submit" name="btn_login" value="Login">

    </form>
</body>

</html>