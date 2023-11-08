<?php 
include 'koneksi.php';

// get variable from form input
$produk = $_POST["nama_produk"];
$deskripsi = $_POST["deskripsi"];
$kategori = $_POST["kategori"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];
$supplier = $_POST["supplier"];

// Upload Proses
$target_dir = "images/"; // path directory image akan di simpan
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // full path dari image yg akan di simpan
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // fungsi ini utk memindahkan file dr tempat asal ke target_file
    echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$result = mysqli_query($conn, "INSERT INTO `produk` (`id`, `gambar`, `nama_produk`, `deskripsi`, `id_produk_kategori`, `harga`, `stok`, `id_supplier`) VALUES ('', '$target_file', '$produk', '$deskripsi', '$kategori', '$harga', '$stok', '$supplier');");

header("Location:index.php");

echo $result;

?>