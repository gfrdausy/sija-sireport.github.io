<?php

include 'koneksi.php';

$Telp = $_POST['Telp'];
$password = $_POST['password'];

$userQuery = "SELECT * FROM user where Telp='$Telp' AND password='$password'";
$query = mysqli_query($konek, $userQuery);
$data = mysqli_fetch_assoc($query);

if($data){
    echo json_encode(
        array(
        'status' => true,
        'message' => "Login Berhasil",
        'data' => array(
            "Telp" => $data["Telp"],
            "name" => $data["name"]
            )
        )
    );
} else {
        echo json_encode(
            array(
                'status' => false,
                'message' => "Login Gagal"
            )
        );
    }



// if($_POST){

//     //data
//     $Telp = $_POST['Telp'] ?? '';
//     $password = $_POST['password'] ?? '';

//     $response = [];

//     //cek uname didalam db
//     $userQuerry = $connection->prepare("SELECT * FROM user where Telp = ?");
//     $userQuerry->execute(array($Telp));
//     $query = $userQuerry->fetch();

//     if($userQuerry->rowCount() == 0){
//         $response['status'] = false;
//         $response['message'] = "Nomer tidak terdaftar";
//     } else{
//         //ambil passwd si db

//         $passwordDb = $query['password'];

//         if(strcmp(md5($password), $passwordDb) === 0){
//             $response['status'] = true;
//             $response['message'] = "login berhasil";
//             $response['data'] = [
//                 'id' => $query['id'], 
//                 'name' => $query['name'],
//                 'Telp' => $query['Telp']
//             ];
//         } else {
//             $response['status'] = false;
//             $response['message'] = "password anda salah";
//         }
//     }

//     //jadikan data JSON
//     $json = json_encode($response, JSON_PRETTY_PRINT);

//     echo $json;
// }
?>