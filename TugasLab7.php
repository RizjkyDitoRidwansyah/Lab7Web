<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input PHP</title>
</head>
<body>
    <h1>Form Input</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nama: <input type="text" name="nama"><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir"><br>
    Pekerjaan:
    <select name="pekerjaan">
        <option value="Programmer">Programmer</option>
        <option value="Desainer">Desainer</option>
        <option value="Manajer">Manajer</option>
        <option value="Game Developer">Game Developer</option>
    </select><br>
    <input type="submit" value="Submit">
</form>

<?php
// Fungsi untuk menghitung umur berdasarkan tanggal lahir
function hitungUmur($tanggal_lahir) {
    $tgl_lahir = new DateTime($tanggal_lahir);
    $sekarang = new DateTime('today');
    $umur = $sekarang->diff($tgl_lahir);
    return $umur->y;
}

// Fungsi untuk menghitung gaji berdasarkan pekerjaan
function hitungGaji($pekerjaan) {
    switch ($pekerjaan) {
        case 'Programmer':
            return 5000000; // Contoh gaji untuk programmer
        case 'Desainer':
            return 4500000; // Contoh gaji untuk desainer
        case 'Manajer':
            return 6000000; // Contoh gaji untuk manajer
        case 'Game Developer';
            return 7000000; // Contoh gaji game developer
        default:
            return 0; // Pekerjaan tidak valid
    }
}

// Memproses form jika data telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $pekerjaan = $_POST["pekerjaan"];

    // Validasi input kosong
    if (empty($nama) || empty($tanggal_lahir) || empty($pekerjaan)) {
        echo "Silakan isi semua field!";
    } else {
        // Hitung umur dan gaji
        $umur = hitungUmur($tanggal_lahir);
        $gaji = hitungGaji($pekerjaan);

        // Tampilkan output
        echo "<h1>Hasil Input:</h1>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
        echo "<p>Pekerjaan: $pekerjaan</p>";
        echo "<p>Umur: $umur tahun</p>";
        echo "<p>Gaji: Rp " . number_format($gaji, 0, ",", ".") . "</p>";
    }
}
?>
</body>
</html>
