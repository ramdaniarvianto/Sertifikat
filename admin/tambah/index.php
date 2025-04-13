<?php 
require_once "../../app/init.php";

if(!isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/tambah.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <a href="<?= BASEURL; ?>/admin">Kembali</a>
    </nav>

    <form class="form-container" action="" method="POST" enctype="multipart/form-data">
        <h1>Tambah File</h1>
        <div class="form f-img">
            <label for="cert">Sertifikat</label>
            <input type="file" name="cert" id="cert" title="Upload sertifikat">
        </div>
        <div class="form f-img">
            <label for="img">Gambar</label>
            <input type="file" name="img" id="img" title="Upload gambar">
        </div>
        <div class="form">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" placeholder="Masukan Nama Company" autocomplete="off">
        </div>
        <div class="form">
            <label for="caption">Caption</label>
            <input type="text" name="caption" id="caption" placeholder="Masukan Caption" autocomplete="off">
        </div>
        <div class="form">
            <button type="submit" name="tambah">Tambah File</button>
        </div>
    </form>
</body>
</html>