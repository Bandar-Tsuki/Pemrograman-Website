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
    <title>Document</title>
</head>

<body>

    <section class="artikel-hero container">
        <div class="container head-text">
            <h1 class="text-center fw-semibold item-1">
                ABOUT
            </h1>
            <img src="../asset/line.png" alt="">
        </div>

    </section>


    <?php
    include "controller/koneksi.php";
    require "controller/menu.php";
    if (!konek()) {
        die("Koneksi Error");
    }
    $querySQL = "SELECT * FROM tentangaku";
    $execQuerySQL = mysqli_query(konek(), $querySQL);

    // Mengecek apakah ada data atau tidak
    if (mysqli_num_rows($execQuerySQL) >= 1) {
        while ($row = mysqli_fetch_assoc($execQuerySQL)) {
    ?>
            <section>
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6">
                        <div class="clip">
                            <img class="img-fluid" src="asset/<?= $row['foto'] ?>" alt="..." />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="h-100 kotaknya">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-lg-left">
                                    <h4 class="text-white text-center"><?= $row['nama'] ?></h4>
                                    <p class="ms-5 mb-0 text-white-50 mt-4">Tanggal lahir : <?= $row['tgl_lahir'] ?></p>
                                    <p class="ms-5 mb-0 text-white-50">Umur : <?= $row['umur'] ?></p>
                                    <p class="ms-5 mb-0 text-white-50">Kota : <?= $row['kota'] ?></p>
                                    <p class="ms-5 mb-0 text-white-50">Email : <?= $row['email'] ?></p>
                                    <p class="ms-5 mb-0 text-white-50">Phone : <?= $row['phone'] ?></p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
        }
    }
        ?>
        <div id="apiData"></div>
            </section>
            <div style="margin-top: 300px;">
            </div>
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