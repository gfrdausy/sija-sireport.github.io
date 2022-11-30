<?php
include 'koneksi.php';

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    $perintah = "SELECT * FROM riwayat_lapor WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response['status'] = true;
        $response['message'] = "Terdapat Laporan";
        $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
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
        $response['status'] = false;
        $response['message'] = "Tidak Ada Data";
    }

} else {
    $response['status'] = false;
    $response['message'] = "Tidak ada Laporan";
}

echo json_encode($response);
mysqli_close(($konek))
// $id = isset($_GET['id']) ? $_GET['id'] : '';
// class emp{};

// if(empty($id)) {
//     echo "Laporan Tidak Ada";
// } else{ 
//     $query = mysqli_query($konek, "SELECT * FROM riwayat_lapor WHERE id='".$id."'");
//     $row = mysqli_fetch_array($query);

//     if(!empty($row)) {
//         $response = new emp();
//         $response->id = $row["id"];
//         $response->nama_pelapor = $row["nama_pelapor"];
//         $response->telp_pelapor = $row["telp_pelapor"];
//         $response->lokasi = $row["lokasi"];
//         $response->tanggal = $row["tanggal"];
//         $response->keterangan = $row["keterangan"];
//         $response->feedback = $row["feedback"];

//         echo(json_encode($response));

//     } else {
//         echo("Data Laporan Tidak Ada");
//     }
// }
?>

