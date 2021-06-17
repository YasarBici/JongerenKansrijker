<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login medewerker</title>

    <?php 
    //Check if submitted to server
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        require_once 'database.php';
        $db = new database;
        $db->login($_POST['username'], $_POST['password']);
    }  
    ?>

</head>
<body>

    <form action="index.php" method="post">
    <label for="username">Username</label><br>
    <input type="text" name="username" required><br>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <input type="submit" value="Login">
    </form>

</body>
</html>