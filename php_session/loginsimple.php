<?php
    session_start();

    if(isset($_POST["login"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
    {
        if($_POST["username"] == "rayzaarf" && $_POST["password"] == "1234") {
            $_SESSION["username"] = "rayzaarf";
            echo "Selamat Datang ".$_SESSION["username"]."!";
        } else {
            echo "Kredensial Tidak Dikenal";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
    <form action="<?php $_PHP_SELF ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Log in</button>
        <a href="logoutsimple.php" class="btn">Clear Session</a>
        </form>
        
    </div>
</body>
</html>