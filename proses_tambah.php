<?php
include("koneksi.php");

$nama_pelanggan = $_POST['nama_pelanggan'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$tanggal_pesan = $_POST['tanggal_pesan'];



$query = "INSERT INTO pesanan (nama_pelanggan,produk,jumlah,tanggal_pesan) 
    VALUES ('$nama_pelanggan','$produk','$jumlah','$tanggal_pesan')";


$tambah = mysqli_query($koneksi, $query);

if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
