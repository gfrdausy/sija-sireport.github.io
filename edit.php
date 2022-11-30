<?php
include 'koneksi.php';

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];
    $feedback = $_POST['feedback'];

    $perintah = "UPDATE riwayat_lapor SET feedback = '$feedback' WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response['status'] = true;
        $response['message'] = "Feedback Berhasil Dikirim";


    } else {
        $response['status'] = false;
        $response['message'] = "Feedback Gagal Dikirim";
    }

} else {
    $response['status'] = false;
    $response['message'] = "Tidak ada Laporan";
}

echo json_encode($response);
mysqli_close(($konek))

?>

