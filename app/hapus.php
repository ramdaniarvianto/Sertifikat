<?php 

function hapus($id, $img, $cert)
{
    global $dbconn;

    $fileCert = "../pdf/{$cert}";
    if(file_exists($fileCert)) {
        unlink($fileCert);
    }

    $fileImg = "../images/{$img}";
    if(file_exists($fileImg)) {
        unlink($fileImg);
    }

    $query = "DELETE FROM sertifikat WHERE id = $id";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

if(isset($_POST["hapus"])) {
    $id = $_GET["id"];
    $cert = $_GET["cert"];
    $img = $_GET["img"];

    if(hapus($id, $img, $cert) > 0) {
        echo "
            <script>
                alert('Sertifikat berhasil dihapus!');
                document.location.href = '".BASEURL."/admin';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Sertifikat gagal dihapus!');
            </script>
        ";
    }
}