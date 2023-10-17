// Definisikan daftar file PHP yang ingin Anda panggil
const phpFiles = [
    'abot.php',
    'eksplorasi.php',
    'index.php',
    'kirim-pesan.php',
    'pendidikan.php'
];

// Fungsi untuk memanggil file PHP dan menangani responsnya
function callPhpFile(url) {
fetch(url)
    .then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.text();
    })
    .then(data => {
    // Lakukan sesuatu dengan data dari file PHP yang dipanggil
    console.log(data);
    })
    .catch(error => {
    console.error('Ada kesalahan:', error);
    });
}

// Loop melalui daftar file PHP dan panggil masing-masing
phpFiles.forEach(file => {
callPhpFile(file);
});
