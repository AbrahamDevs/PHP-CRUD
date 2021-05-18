<?php
require 'config/settings.php';
session_start();
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //check cookie

    if($key === hash('snefru', $row["username"])){
        $_SESSION["login"] = true;
    }
}
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

   $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

   if(mysqli_num_rows($result) == 1){
       $row = mysqli_fetch_assoc($result);
       if(password_verify($password, $row["password"])){
           $_SESSION["login"] = true;
           
        if(isset($_POST["remember"])){
            setcookie('id', $row['id'], time() + 120);
            setcookie('key', hash('snefru', $row["username"]), time() + 120);
        }
           header("Location: index.php");
           exit;
       }
   }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="icon" href="logo/icon1.png" />
    <title>Admin Login</title>
</head>
<body>
    <h1>Halaman Login Admin</h1>
    <a style="color: #00CED1;" href="register.php"><i>Register Admin Account!</i></a>
    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username / Password Salah</p>
    <?php endif; ?>
    <form action="" method="POST">

    <div class="form-text" id="login">
    <div class="mb-3">
    <label class="form-label" for="username">Username</label>
    <input type="text" class="form-control w-25" name="username" id="username" required>
    </div>
    <br>
    <div class="mb-3">
    <label class="form-label" for="password">Password: </label>
    <input type="password" class="form-control w-25" name="password" id="password" required>
    </div>
    <div class="mb-3">
    <input type="checkbox" name="remember" id="remember">
    <label class="form-label" for="remember">Remember Me </label>
    </div>
    <br>
    <button class="btn btn-primary" type="submit" name="login">Sign In!</button>
    </div>
    </form>
</body>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</html>