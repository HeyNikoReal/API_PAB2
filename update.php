<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tahun_aktif = $_POST["tahun_aktif"];
    $pekerjaan = $_POST["pekerjaan"];
    $film = $_POST["film"];
    $penghargaan = $_POST["penghargaan"];
    $foto = $_POST["foto"];
    
    $perintah = "UPDATE tbl_aktor SET nama = '$nama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', tahun_aktif = '$tahun_aktif', pekerjaan = '$pekerjaan', film = '$film' , penghargaan = '$penghargaan', foto = '$foto'  WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Mengubah Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);
