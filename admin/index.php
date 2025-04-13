<?php 
require_once "../app/init.php";

if(!isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/login");
    exit;
}

if (!isset($_SESSION["id"])) {
    header("Location: " . BASEURL . "/login");
    exit;
}

$id = $_SESSION["id"];

$serti = query("SELECT * FROM user WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once "../templates/header.php"; ?>

    <main>
        <!-- DASH DISPLAY -->
        <div style="grid-area: dash-display;" class="dash d-display">
            <div class="di-img">
                <img src="<?= BASEURL; ?>/upload/<?= $serti["img"]; ?>" alt="<?= $serti["nama"]; ?>">
            </div>
            <div class="di-profile">
                <h1><?= $serti["nama"]; ?></h1>
                <p><?= $serti["job"]; ?></p>
            </div>
        </div>
        <!-- DASH INPUT -->
        <form style="grid-area: dash-input;" class="dash d-input" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?= $serti["id"]; ?>">
            <input type="hidden" name="imgLama" id="imgLama" value="<?= $serti["img"]; ?>">
            <div class="di-form di-f-img">
                <label for="img">Gambar</label>
                <input type="file" name="img" id="img" title="Upload gambar">
            </div>
            <div class="di-form">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $serti["nama"]; ?>" placeholder="Masukan Nama" autocomplete="off">
            </div> 
            <div class="di-form">
                <label for="job">Pekerjaan</label>
                <input type="text" name="job" id="job" value="<?= $serti["job"]; ?>" placeholder="Masukan Pekerjaan" autocomplete="off">
            </div>
            <div class="di-form">
                <button type="submit" name="simpan">Simpan</button>
            </div>
        </form>
        <!-- DASH TOOL -->
        <div style="grid-area: dash-tool;" class="dash d-tool">
            <p><i class="fa-solid fa-file-pdf"></i> <?= $sCount; ?> Sertifikat</p>
            <a href="<?= BASEURL; ?>/admin/tambah">Tambah File</a>
        </div>
        <!-- DASH CERTIFICATE -->
        <div style="grid-area: dash-certificate;" class="dash d-certificate">
            <?php foreach ($sertifikat as $srt) : ?>
            <div class="dc-container">
                <div class="dc-img">
                    <img src="<?= BASEURL; ?>/images/<?= $srt["img"]; ?>" alt="">
                </div>
                <div class="dc-comp">
                    <p><?= $srt["company"]; ?></p>
                </div>
                <div class="dc-info">
                    <div class="dc-i-text">
                        <p><?= $srt["caption"]; ?></p>
                    </div>
                    <div class="dc-i-timestamp">
                        <p><i class="fa-solid fa-certificate"></i> <?= date("d M Y", strtotime($srt["timestamp"])); ?></p>
                    </div>
                </div>
                <div class="dc-act">
                    <a href="<?= BASEURL; ?>/admin/edit?id=<?= $srt["id"]; ?>">Edit File</a>
                    <form action="?id=<?= $srt["id"] ?>&img=<?= $srt["img"]; ?>&cert=<?= $srt["cert"] ?>" method="POST"><button type="submit" name="hapus" onclick="return confirm('Yakin ingin menghapus sertifikat ini?')">Hapus</button></form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>