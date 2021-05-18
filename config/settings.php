<?php
//Please Fill out the Credentials!
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';

//connect
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function addData($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHp"]);
    $query = "INSERT INTO siswa VALUES ('', '$nama', '$email', '$noHp')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id =  $id");
    return mysqli_affected_rows($conn);
}

function editData($data){
    global $conn;
    $id = htmlentities($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $noHp = htmlspecialchars($data["noHp"]);

    $query = "UPDATE siswa SET nama = '$nama', email = '$email', noHp = $noHp WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function searchData($search){
    $query = "SELECT * FROM siswa WHERE nama LIKE '%$search%' OR email LIKE '%$search%' OR noHp LIKE '%$search%'";
    return query($query);
}

function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $adminConfirm = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($adminConfirm)){
        echo '<script>alert("Username sudah dipakai!");</script>';
        return false;
    }

    if($password !== $password2){
        echo '<script>alert("Konfirmasi password tidak sesuai!");</script>';
        return false;
    }
    
    //encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);

}
?>
