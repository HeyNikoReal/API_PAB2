<?php
require("koneksi.php");
$perintah = "SELECT * FROM tbl_aktor";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek>0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama"] = $get->nama;
        $var["tempat_lahir"] = $get->tempat_lahir;
        $var["tanggal_lahir"] = $get->tanggal_lahir;
        $var["tahun_aktif"] = $get->tahun_aktif;
        $var["pekerjaaan"] = $get->pekerjaan;
        $var["film"] = $get->film;
        $var["penghargaan"] = $get->penghargaan;
        $var["foto"] = $get->foto;
        
        array_push($response["data"], $var);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($connect);
