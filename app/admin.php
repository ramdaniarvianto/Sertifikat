<?php 

function admin($data)
{
    global $dbconn;

    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $job = htmlspecialchars($data["job"]);
    $imgLama = htmlspecialchars($data["imgLama"]);

    if($_FILES["img"]["error"] === 4) {
        $img = $imgLama;
    } else {
        if(file_exists("../upload/{$imgLama}")) {
            unlink("../upload/{$imgLama}");
        }
        $img = uploadAdmin();
    }

    $query = "UPDATE user SET
        nama = '$nama',
        job = '$job',
        img = '$img'
        WHERE id = $id
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

function uploadAdmin()
{
    $namaFile = $_FILES["img"]["name"];
    $error = $_FILES["img"]["error"];
    $tmpName = $_FILES["img"]["tmp_name"];

    if($error === 4) {
        echo "
            <scrtip>
                alert('Kamu belum mengupload gambar');
            </scrtip>
        ";
        return false;
    }

    $xImgvalid = ["jpeg", "jpg", "png", "ico"];
    $imgValid = explode(".", $namaFile);
    $imgValid = strtolower(end($imgValid));
    if(!in_array($imgValid, $xImgvalid)) {
        echo "
            <script>
                alert('Yang kamu upload bukan gambar!');
            </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid() . ".{$imgValid}";

    move_uploaded_file($tmpName, "../upload/" . $namaFileBaru);

    return $namaFileBaru;
}

if(isset($_POST["simpan"])) {
    if(admin($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil disimpan!');
                document.location.href = '".BASEURL."/admin';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal disimpan!');
            </script>
        ";
    }
}