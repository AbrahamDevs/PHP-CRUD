<?php
require 'config/settings.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
} 
$siswa = query("SELECT * FROM siswa");

//searching query
if(isset($_POST["s"])){
    $siswa = searchData($_POST["search"]);
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
    <title>Admin Panel</title>
</head>
<body>
    
<h1>Admin Panel Demo V1</h1>
<a href="add.php" target="_blank">Add Data</a>
<br><br>
<!-- Search Data -->
<form action="" method="POST">
<div class="mb-3">
<input type="text" name="search" class="form-control w-25" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
</div>
<button class="btn btn-primary" type="submit" name="s">Search</button>
</form>
<br><br>
<table class="table table-dark table-striped" id="users">
<tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Nomer Hp</th>
</tr>
<?php $i = 1; ?>
<?php foreach( $siswa as $row ) : ?>

<tr>
    <td><?= $i; ?></td>
    <td>
      <a href="edit.php?id=<?= $row["id"]; ?>" class="link-info">Edit</a> |   
      <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="link-info">Delete</a>
    </td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["email"]; ?></td>
    <td><?= $row["noHp"]; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
<br>
<a style="color: #00FF00;" href="logout.php">Log out!</a>
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