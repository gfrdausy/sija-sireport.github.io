<?php
include 'koneksi.php';

$response = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nama_pelapor = $_POST['nama_pelapor'];
    $telp_pelapor = $_POST['telp_pelapor'];
    $jenis = $_POST['jenis'];
    $lokasi = $_POST['lokasi'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $perintah = "INSERT INTO riwayat_lapor (nama_pelapor, telp_pelapor, jenis, lokasi, tanggal,keterangan) VALUES ('$nama_pelapor','$telp_pelapor','$jenis', '$lokasi','$tanggal','$keterangan')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response['status'] = true;
        $response['message'] = "Berhasil Membuat Laporan";
    } else {
        $response['status'] = false;
        $response['message'] = "Gagal Membuat Laporan";
    }

} else {
    $response['status'] = false;
    $response['message'] = "Tidak ada Laporan";
}

echo json_encode($response);
mysqli_close(($konek))
?>