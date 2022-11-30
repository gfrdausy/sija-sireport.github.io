<?php
include 'koneksi.php';

$response = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST['id'];
    

    $perintah = "DELETE FROM  riwayat_lapor WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response['status'] = true;
        $response['message'] = "Berhasil Menghapus";
    } else {
        $response['status'] = false;
        $response['message'] = "Gagal Menghapus";
    }

} else {
    $response['status'] = false;
    $response['message'] = "Tidak ada Laporan";
}

echo json_encode($response);
mysqli_close(($konek))
?>

