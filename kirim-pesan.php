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
<?php 
    include "controller/koneksi.php";
    require "controller/menu.php";
    if(!konek()) {
        die("Koneksi Error");
    }
    if (isset($_POST['pengirim']) AND isset($_POST['isi_pesan'])) {
        $pengirim = $_POST['pengirim'];
        $isi_pesan = $_POST['isi_pesan'];
        $email = $_POST['email'];
        $querySQL = "INSERT INTO pesan (pengirim, isi_pesan) 
        VALUES ('$pengirim', '$isi_pesan')";
        $execSQL = mysqli_query(konek(),$querySQL);
        }
    ?>
    <section>
            <div class="container content-pesan">
                <h2>
                    Please drop your message here !
                </h2>
            </div>
            <div class="container">  
            <form id="contact" action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="pengirim" class="fw-bold">NAME</label>             
                    <input type="text" class="form-control" id="pengirim" placeholder="Input Nama" name="pengirim">          
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="fw-bold">EMAIL</label>             
                    <input type="text" class="form-control" id="email" placeholder="Input Email" name="email">          
                </div>
                <div class="mb-3 mt-3">
                    <label for="isi_pesan" class="fw-bold">Message</label>             
                    <input type="text" class="form-control" id="isi_pesan" placeholder="Isi Pesanmu" name="isi_pesan">
                </div>   
                <button type="submit">SAVE</button>  
            </form> 
    </section>
        <div style="margin-top: 240px;">
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
