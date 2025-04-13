<?php 
require_once "app/init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="head-img">
            <a href="<?= BASEURL; ?>/upload/ramdani.jpg" target="_blank">
                <img src="<?= BASEURL; ?>/upload/<?= $sert["img"]; ?>" alt="<?= $sert["nama"]; ?>">
            </a>
        </div>
        <div class="head-profile">
            <h1><?= $sert["nama"]; ?></h1>
            <p><?= $sert["job"]; ?></p>
        </div>
        <div class="head-info">
            <div class="hi-sCount">
                <p><i class="fa-solid fa-file-pdf"></i> <?= $sCount; ?> Sertifikat</p>
            </div>
            <div class="hi-links">
                <a href="https://github.com/ramdaniarvianto" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/ramdaniarvianto/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://youtube.com/@ramdaniarvianto?si=4gxTHmSt90PBY52g" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://www.instagram.com/ramdanlarvianto/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@ramdaniarvianto" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
    </header>

    <main>
        <?php foreach ($sertifikat as $srt) : ?>
        <a href="<?= BASEURL; ?>/pdf/<?= $srt["cert"]; ?>" class="sertifikat" target="_blank">
            <div class="serti-img">
                <img src="<?= BASEURL; ?>/images/<?= $srt["img"]; ?>" alt="">
            </div>
            <div class="serti-comp">
                <p><?= $srt["company"]; ?></p>
            </div>
            <div class="serti-info">
                <div class="si-text">
                    <p><?= $srt["caption"]; ?></p>
                </div>
                <div class="si-timestamp">
                    <p><i class="fa-solid fa-certificate"></i> <?= date("d M Y", strtotime($srt["timestamp"])); ?></p>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </main>
</body>
</html>