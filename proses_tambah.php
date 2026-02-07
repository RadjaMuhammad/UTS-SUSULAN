<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$nama_pelanggan = $_POST['nama_pelanggan'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$tanggal_pesan = $_POST['tanggal_pesan'];



#3. Query Insert (proses tambah data)
$query = "INSERT INTO pesanan (nama_pelanggan,produk,jumlah,tanggal_pesan) 
    VALUES ('$nama_pelanggan','$produk','$jumlah','$tanggal_pesan')";


$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
