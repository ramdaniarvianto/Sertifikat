<?php 

function tambah($data)
{
    global $dbconn;

    $cert = uploadSerti();
    $img = uploadSertimg();
    $company = htmlspecialchars($data["company"]);
    $caption = htmlspecialchars($data["caption"]);

    if(!$cert || !$img) {
        return false;
    }

    $query = "INSERT INTO sertifikat VALUES
        ('', '$cert', '$img', '$company', '$caption', CURRENT_TIMESTAMP())
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

function edit($data)
{
    global $dbconn;

    $id = htmlspecialchars($data["id"]);
    $certLama = htmlspecialchars($data["certLama"]);
    $imgLama = htmlspecialchars($data["imgLama"]);
    $company = htmlspecialchars($data["company"]);
    $caption = htmlspecialchars($data["caption"]);

    if($_FILES["cert"]["error"] === 4) {
        $cert = $certLama;
    } else {
        $cert = uploadSerti();
    }

    if($_FILES["img"]["error"] === 4) {
        $img = $imgLama;
    } else {
        $img = uploadSertimg();
    }

    $query = "UPDATE sertifikat SET
        cert = '$cert',
        img = '$img',
        company = '$company',
        caption = '$caption'
        WHERE id = $id
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

function uploadSerti()
{
    $namaFile = $_FILES["cert"]["name"];
    $error = $_FILES["cert"]["error"];
    $tmpName = $_FILES["cert"]["tmp_name"];

    if($error === 4) {
        echo "
            <script>
                alert('Kamu belum mengupload file');
            </script>
        ";
        return false;
    }

    $exPdfValid = ["pdf"];
    $exPdf = explode(".", $namaFile);
    $exPdf = strtolower(end($exPdf));
    if(!in_array($exPdf, $exPdfValid)) {
        echo "
            <script>
                alert('Yang kamu upload bukan file PDF!');
            </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid() . ".{$exPdf}";

    move_uploaded_file($tmpName, "../../pdf/{$namaFileBaru}");

    return $namaFileBaru;
}

function uploadSertimg()
{
    $namaFile = $_FILES["img"]["name"];
    $error = $_FILES["img"]["error"];
    $tmpName = $_FILES["img"]["tmp_name"];

    if($error === 4) {
        echo "
            <script>
                alert('Kamu belum mengupload file');
            </script>
        ";
        return false;
    }

    $exImgValid = ["jpeg", "jpg", "png", "ico"];
    $exImg = explode(".", $namaFile);
    $exImg = strtolower(end($exImg));
    if(!in_array($exImg, $exImgValid)) {
        echo "
            <script>
                alert('Yang kamu upload bukan gambar!');
            </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid() . ".{$exImg}";

    move_uploaded_file($tmpName, "../../images/{$namaFileBaru}");

    return $namaFileBaru;
}

if(isset($_POST["tambah"])) {
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('Sertifikat berhasil ditambah!');
                document.location.href = '".BASEURL."/admin';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Sertifikat gagal ditambah!');
            </script>
        ";
    }
}

if(isset($_POST["edit"])) {
    if(edit($_POST) > 0) {
        echo "
            <script>
                alert('Sertifikat berhasil diedit!');
                document.location.href = '".BASEURL."/admin';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Sertifikat gagal diedit!');
            </script>
        ";
    }
}