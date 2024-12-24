<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tracer Alumni</title>
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
padding: 0;
background-color: #f4f4f9;
color: #333;
}

header {
background-color:rgb(202, 36, 191);
color: white;
padding: 20px;
text-align: center;
}

main {
margin: 20px auto;
max-width: 800px;
background: white;
padding: 20px;
border-radius: 10px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1, h2 {
text-align: center;
}

form {
display: flex;
flex-direction: column;
gap: 10px;
}

label {
font-weight: bold;
}

input {
padding: 10px;
font-size: 14px;
border: 1px solid #ffc0cb;
border-radius: 5px;
width: 100%;
}

button {
padding: 10px 15px;
font-size: 16px;
color: white;
background-color:rgb(216, 26, 213);
border: none;
border-radius: 5px;
cursor: pointer;
transition: background-color 0.2s;
}

button:hover {
background-color:rgb(151, 46, 141);
}

table {
width: 100%;
border-collapse: collapse;
margin-top: 20px;
}

table, th, td {
border: 1px solid #ddd;
}

th, td {
padding: 12px;
text-align: center;
}

th {
background-color: #f4f4f4;
font-weight: bold;
}

tr:nth-child(even) {
background-color: #f9f9f9;
}

tr:hover {
background-color: #f1f1f1;
}

.no-data {
text-align: center;
font-style: italic;
color: #888;
}
</style>
</head>
<body>
<header>
<h1>Tracer Alumni</h1>
</header>

<main>
<!-- Form untuk input data -->
<h2>Input Data Alumni</h2>
<form action="proses.php" method="POST">
<label for="nama">Nama:</label>
<input type="text" id="nama" name="nama" required>

<label for="tahun_lulus">Tahun Lulus:</label>
<input type="number id"="Tahun Lulus" name="tahun_lulus" required>
<label for="pekerjaan">Pekerjaan:</label>
<input type="text" id="pekerjaan" name="pekerjaan" required>
<button type="submit">Simpan</button>
</form>

<!-- Tabel Data Alumni -->
<h2>Data Alumni</h2>
<table>
<tr>
<th>No</th>
<th>Nama</th>
<th>Tahun Lulus</th>
<th>Pekerjaan</th>
</tr>
<?php
// Membaca data dari file teks
$file = 'data_alumni.txt';
if (file_exists($file)) {
$data = file($file, FILE_IGNORE_NEW_LINES);
$no = 1;
foreach ($data as $row) {
list($nama, $tahun_lulus, $pekerjaan) = explode('|', $row);
echo "<tr>
<td>{$no}</td>
<td>{$nama}</td>
<td>{$tahun_lulus}</td>
<td>{$pekerjaan}</td>
</tr>";
$no++;
}
} else {
echo "<tr><td colspan='4' class='no-data'>Belum ada data.</td></tr>";
}
?>
</table>
</main>
</body>
</html>