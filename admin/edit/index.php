<?php 
require_once "../../app/init.php";

if(!isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/login");
    exit;
}

$id = $_GET["id"];

$sertif = query("SELECT * FROM sertifikat WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit File</title>
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
        <h1>Edit File</h1>
        <input type="hidden" name="id" id="id" value="<?= $sertif["id"]; ?>">
        <input type="hidden" name="certLama" id="certLama" value="<?= $sertif["cert"]; ?>">
        <input type="hidden" name="imgLama" id="imgLama" value="<?= $sertif["img"]; ?>">
        <div class="form f-img">
            <label for="cert">Sertifikat</label>
            <p class="nama-file"><i class="fa-solid fa-file-pdf"></i> <?= $sertif["cert"]; ?></p>
            <input type="file" name="cert" id="cert" title="Upload sertifikat">
        </div>
        <div class="form f-img">
            <label for="img">Gambar</label>
            <img src="<?= BASEURL; ?>/images/<?= $sertif["img"]; ?>" alt="">
            <input type="file" name="img" id="img" title="Upload gambar">
        </div>
        <div class="form">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" value="<?= $sertif["company"]; ?>" placeholder="Edit Nama Company" autocomplete="off">
        </div>
        <div class="form">
            <label for="caption">Caption</label>
            <input type="text" name="caption" id="caption" value="<?= $sertif["caption"]; ?>" placeholder="Edit Caption" autocomplete="off">
        </div>
        <div class="form">
            <button type="submit" name="edit">Edit File</button>
        </div>
    </form>
</body>
</html>