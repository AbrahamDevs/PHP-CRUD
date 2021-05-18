<?php
require 'config/settings.php';
if(isset($_POST["register"])){
    
    if(register($_POST) > 0){
        echo '<script>alert("User baru berhasil ditambahkan!");</script>';
    }
    else{
        echo mysqli_error($conn);
    }
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
    <title>Register Admin</title>
</head>
<body>
<h1>Registration Page</h1>
<form action="" method="POST">
    <div class="form-text">
    <div class="mb-3">
    <label for="username" class="form-label">Username: </label>
    <input type="text" class="form-control w-25" name="username" id="username" required>
    </div>
    <br>
    <div class="mb-3">
    <label for="password" class="form-label">Password: </label>
    <input type="password" class="form-control w-25" name="password" id="password" required>
    </div>
    <br>
    <div class="mb-3">
    <label for="password2" class="form-label">Konfirmasi password: </label>
    <input type="password" class="form-control w-25" name="password2" id="password2" required>
    </div>
    <br>
    <button class="btn btn-primary" type="submit" name="register">Register!</button>
</form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>
</html>