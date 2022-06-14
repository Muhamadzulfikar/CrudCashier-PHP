<?php 

include 'koneksi.php';

$totalharga = $_GET['totalharga'];
$totalstoksisa = $_GET['totalstok'];
$idbarang = $_GET['idbarang'];
$jumlahdibeli = $_GET['jumlahdibeli'];

global $koneksi; // read docs : winteresso.netlify.app

$cekdata = "SELECT * FROM barang WHERE id_barang = '$idbarang'";
$connectcekdata = mysqli_query($koneksi, $cekdata);
while($ambildata = mysqli_fetch_array($connectcekdata)){
	$namabarang = $ambildata['nama_barang'];
	$hargabarang = $ambildata['harga_barang'];
}

$history = "INSERT INTO barang_checkout set id_barangck = '$idbarang', nama_barangck = '$namabarang', harga_barangck = '$hargabarang', jumlah_barangck = '$totalstoksisa', totalhargack = '$totalharga', jumlahdibelick = '$jumlahdibeli'";
$connecthistory = mysqli_query($koneksi, $history);

if($connecthistory){
	header("location:index.php");
}


 ?>