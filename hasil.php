<?php
include 'koneksi.php';

$query = mysqli_query($konek, "SELECT * FROM riwayat_lapor");
$cek = mysqli_affected_rows($konek);
if($cek > 0){
    $response["status"] = true;
    $response["message"] = "Terdapat Laporan";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($query)){
        $F["id"] = $ambil->id;
        $F["telp_pelapor"] = $ambil->telp_pelapor;
        $F["nama_pelapor"] = $ambil->nama_pelapor;
        $F["jenis"] = $ambil->jenis;
        $F["lokasi"] = $ambil->lokasi;
        $F["tanggal"] = $ambil->tanggal;
        $F["keterangan"] = $ambil->keterangan;
        $F["feedback"] = $ambil->feedback;

        array_push($response["data"], $F);
    }


} else {
    $response["status"] = false;
    $response["message"] = "Tidak Ada Laporan";
}
 echo json_encode($response);
 mysqli_close($konek);
?>