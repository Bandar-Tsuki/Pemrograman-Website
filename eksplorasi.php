<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <script src="main.js"></script>
    <title>Document</title>
</head>

<body>

    <section class="eksplorasi-hero container-fluid">
        <div class="context">
            <h1>EKSPLORASI</h1>
        </div>
        <div class="area">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </section>


    <?php
    include "controller/koneksi.php";
    require "controller/menu.php";
    if (!konek()) {
        die("Koneksi Error");
    }

    $querySQL = "SELECT * FROM eksplordikitaja";
    $execQuerySQL = mysqli_query(konek(), $querySQL);

    // Mengecek apakah ada data atau tidak
    if (mysqli_num_rows($execQuerySQL) >= 1) {
        while ($row = mysqli_fetch_assoc($execQuerySQL)) {
    ?>

            <section class="p-0" id="portfolio">
                <div class="container-fluid p-0">
                    <div class="row no-gutters popup-gallery">
                        <div class="row row-cols-1">
                            <div class="col">
                            <a class="portfolio-box" href="img/portfolio/fullsize/<?= $row['foto'] ?>">
                                <img class="img-fluid" src="img/portfolio/thumbnails/<?= $row['foto'] ?>" alt="">
                                <div class="portfolio-box-caption">
                                    <div class="portfolio-box-caption-content">
                                        <div class="project-category text-faded">
                                            Category
                                        </div>
                                        <div class="project-name">
                                            Project Name
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php
        }
    }
    ?>
    <script>
        // Fungsi untuk mengambil data dari API
        function getDataFromAPI() {
            fetch('api.php') // Ganti 'api.php' dengan URL sebenarnya ke endpoint API Anda
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Menguraikan respons JSON
                })
                .then(data => {
                    // Memproses data dari API
                    const apiDataElement = document.getElementById('apiData');
                    apiDataElement.innerHTML = `
                    <p>Message: ${data.message}</p>
                    <p>Timestamp: ${data.timestamp}</p>
                `;
                })
                .catch(error => {
                    console.error('Ada kesalahan:', error);
                });
        }

        // Panggil fungsi untuk mengambil data dari API saat halaman dimuat
        getDataFromAPI();
    </script>
</body>
<footer>
    <?php
    include "controller/footer.php"
    ?>
</footer>

</html>