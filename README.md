# CrudCashier-PHP
this program helps you calculate the price of the goods you sell

#  catatan
harap sesuaikan database yang anda buat dengan kode di php agar tidak terjadi eror.

# Dokumentasi Program
### Alur kerja program
saya memiliki ide untuk membuat sistem ini memiliki dua database, database pertama digunakan untuk menyimpan semua daftar harga barang yang dijual di toko dan database yang kedua digunakan untuk menampilkan barang-barang apa saja yang dibeli oleh pelanggan. konsepnya barang yang berasal dari database stock barang akan dikirimkan ke database untuk menampilkan barang.

database tampil seperti yang terlihat dibawah itu digunakan untuk menampilkan barang apa saja yang dibeli oleh user.
```php
  $tampil = mysqli_query($koneksi, "SELECT * FROM tampil");
```

 idbarang digunakan untuk mengambil data item dari database stockbarang yang nanti akan dikirm kedalam database tampil
```php
   $idbarang = $_POST["idbarang"];
   $stockbarang = mysqli_query($koneksi, "SELECT * FROM stockbarang where idbarang = '$idbarang'");
```

kode ini digunakan untuk ekstrasi data item yang terdapat pada database stock barang
```php
 $rowstock = mysqli_fetch_assoc($stockbarang);
 $rowidbarang = $rowstock['idbarang'];
 $rownamabarang = $rowstock['namabarang'];
 $rowhargabarang = $rowstock['hargabarang'];
 $jumlah = $_POST["jumlahbarang"];
 $subtotal = $rowhargabarang * $jumlah;
```
kode ini untuk memasukan data item ke database tampil
```php
$inserttampil = "INSERT INTO tampil (idbarang, namabarang, hargabarang, jumlah, subtotal) values ('$rowidbarang', '$rownamabarang', '$rowhargabarang', '$jumlah', '$subtotal')";
mysqli_query($koneksi, $inserttampil);
header("location:kasir.php");
```
