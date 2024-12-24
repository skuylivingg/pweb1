<?php
// Mengecek apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nama = $_POST['nama'];
$tahun_lulus = $_POST['tahun_lulus'];
$pekerjaan = $_POST['pekerjaan'];

// Format data yang akan disimpan
$data = "{$nama}|{$tahun_lulus}|{$pekerjaan}\n";

// Menyimpan data ke dalam file teks
file_put_contents('data_alumni.txt', $data, FILE_APPEND);

// Redirect kembali ke halaman utama
header('Location: index.php');
exit;
}
?>