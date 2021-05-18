<?php
require 'config/settings.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
if(isset($_POST["submit"])){
   if(addData($_POST) > 0){
        echo '<script>
        alert("Data berhasil ditambahkan!");
        document.location.href = "index.php";
        </script>';
   }
   else{
       echo '<script>alert("Data gagal ditambahkan!");</script>';
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="logo/icon1.png" />
    <title>Add Data</title>
</head>
<body id="body-part">
    <h1>Tambah Data</h1>
    <div id="content">
    <form action="" method="POST">
    <font color="white">
        <div class="mb-3"> 
        <label for="nama" class="form-label">Nama: </label>
        <input type="text" class="form-control w-25" name="nama" id="nama" required>
        </div>
        <br>
        <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control w-25" name="email" id="email" required>
        </div>
        <br>
        <div class="mb-3">
        <label for="noHp" class="form-label">Nomor HP: </label>
        <input type="number" class="form-control w-25" name="noHp" id="noHp" required>
        </div>
        </font>
        <br>
        <button class="btn btn-primary" type="submit" name="submit">Tambah!</button>
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