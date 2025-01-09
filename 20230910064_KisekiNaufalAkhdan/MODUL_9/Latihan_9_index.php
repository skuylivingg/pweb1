<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Template</title>
    <!-- Bootstrap 5 CSS -->
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body{
            margin:0;/*Menghilangkan margin default dari body*/
        }
        .jumbotron-bg{
            background-image: url('https://fkom.uniku.ac.id/wp-content/uploads/2023/01/Header-Home.jpg');/*URL gambar latang belakang*/
            background-size: cover;
            background-position: center;
            color: white;/*Warna teks jumbotron*/
        }
    </style>
</head>
<body>
    <!-- Bagian Atas: jumbotron dengan latar belakang gambar -->
    <header class="jumbotron-bg text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 text-bold">Selamat Datang di Website Kami</h1>
        </div>
    </header>

    <div class="container-fluid my-4">
        <div class="row">
            <!-- Bagian kiri: Menu -->
            <?php include "Latihan_9_menu.php";?>
            <!-- Bagian tengah: artikel -->
            <main class="col-md-10">
                <article>
                    <?php
                        extract($_GET);
                        if(isset($menu)){
                            if($menu == "home"){ include "Latihan_9_index.php";}
                            elseif($menu == "about"){ include "Latihan_9_about.php";}
                            elseif($menu == "alumni"){ include "Latihan_9_ralumni.php";}
                            elseif($menu == "calumni"){ include "Latihan_9_calumni.php";}
                            elseif($menu == "ualumni"){ include "Latihan_9_ualumni.php";}
                            elseif($menu == "buku_tamu"){ include "buku_tamu.php";}
                            elseif($menu == "Bursa_Kerja"){ include "Bursa_Kerja.php";}
                            elseif($menu == "PencarianAlumni"){ include "PencarianAlumni.php";}
                        }else{
                            // include "Latihan_9_home.php";
                        }
                    ?>
                </article>
            </main>
        </div>
    </div>

    <!-- Bagian bawah: footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Website Kami. All rights reserved.</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src=>"https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"</script>
</body>
</html>