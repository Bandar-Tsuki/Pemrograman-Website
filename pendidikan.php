<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <section class="artikel-hero container-fluid">
        <div class="container-fluid head-text">
            <div class="col-sm-12">
                <h1 class="text-center fw-semibold item-1" style="color:#F99417; margin-top:130px;">
                    EDUCATIONAL BACKGROUND
                </h1>
                <img src="asset/line.png" class="img-fluid" alt="">
            </div>
        </div>
    </section>
    <div class="row mb-2">
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped" border="0">
            <thead>
                <tr>
                    <th>Jenjang</th>
                    <th>Nama Sekolah</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>


                <?php
                include "controller/koneksi.php";
                require "controller/menu.php";
                if (!konek()) {
                    die("Koneksi Error");
                }
                $querySQL = "SELECT * FROM riwayatakademik";
                $execQuerySQL = mysqli_query(konek(), $querySQL);

                // Mengecek apakah ada data atau tidak
                if (mysqli_num_rows($execQuerySQL) >= 1) {
                    while ($row = mysqli_fetch_assoc($execQuerySQL)) {
                ?>
                        <tr>
                            <td><?= $row["jenjang"] ?></td>
                            <td><?= $row["namasekolah"] ?></td>
                            <td><?= $row["tahun"] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <div style="margin-top: 240px;" class="mt-2">
        <div id="apiData"></div>
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