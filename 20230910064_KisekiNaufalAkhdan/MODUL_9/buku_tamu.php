<?php
// Simpan data buku tamu ke dalam file JSON
$file = 'buku_tamu.json'; // File untuk menyimpan data buku tamu

// Periksa apakah file JSON ada
if (!file_exists($file)) {
    file_put_contents($file, json_encode([])); // Buat file kosong jika belum ada
}

// Ambil data buku tamu dari file
$data_buku_tamu = json_decode(file_get_contents($file), true);

// Periksa jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Tambahkan data ke array
    $data_buku_tamu[] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan,
        'waktu' => date("Y-m-d H:i:s"),
    ];

    // Simpan data ke file JSON
    file_put_contents($file, json_encode($data_buku_tamu));
    echo "<div class='alert alert-success'>Data berhasil ditambahkan!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <style>
        .guest-item { margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Buku Tamu</h1>

    <!-- Form Buku Tamu -->
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="pesan">Pesan:</label><br>
        <textarea id="pesan" name="pesan" required></textarea><br><br>

        <button type="submit">Kirim</button>
    </form>

    <hr>

    <!-- Tampilkan Data Buku Tamu -->
    <h2>Pesan dari Tamu</h2>
    <?php
    if (!empty($data_buku_tamu)) {
        foreach ($data_buku_tamu as $tamu) {
            echo "<div class='guest-item'>";
            echo "<strong>Nama:</strong> " . htmlspecialchars($tamu['nama']) . "<br>";
            echo "<strong>Email:</strong> " . htmlspecialchars($tamu['email']) . "<br>";
            echo "<strong>Pesan:</strong> " . htmlspecialchars($tamu['pesan']) . "<br>";
            echo "<strong>Waktu:</strong> " . htmlspecialchars($tamu['waktu']) . "<br>";
            echo "</div>";
        }
    } else {
        echo "<p>Belum ada pesan.</p>";
    }
    ?>
</body>
</html>
