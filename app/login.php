<?php 
session_start();

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $checkuser = mysqli_query($dbconn, $query);

    if(mysqli_num_rows($checkuser) === 1) {
        $row = mysqli_fetch_assoc($checkuser);
        if(password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["nama"] = $row["nama"];

            header("Location: " . BASEURL . "/admin");
            exit;
        }
    }
    $error = true;
}

if(isset($_POST["logout"])) {
    header("Location: " . BASEURL . "/app/logout.php");
    exit;
}