<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Login</h1>
    <?php include "login_process.php" ?>
    <form action="login.php" method="post">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" /><br />

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" /><br />

        <input type="submit" value="Login" />
    </form>
</body>
</html>