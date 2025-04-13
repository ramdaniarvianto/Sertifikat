<?php 
require_once "../app/init.php";

if(isset($_SESSION["login"])) {
    header("Location: " . BASEURL);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <h1>Login</h1>
        
        <?php if (isset($error)) : ?>
            <p>Username atau password salah!</p>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukan username" autocomplete="off">
            </div>
            <div class="form">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukan password">
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </main>
</body>
</html>