<!DOCTYPE html>
<html>
<head>
	<title>history</title>
</head>
<body>
	<div style="display: flex; justify-content: center;">
	<table border="1" style="padding: 10px;text-align: center;">
		<tr>
			<td><span style="font-weight: bolder;">ID barang</span></td>
			<td><span style="font-weight: bolder;">Nama barang</span></td>
			<td><span style="font-weight: bolder;">Harga barang</span></td>
			<td><span style="font-weight: bolder;">Total bayar</span></td>
			<td><span style="font-weight: bolder;">Jumlah barang</span></td>
			<td><span style="font-weight: bolder;">stok sisa</span></td>
			<td><span style="font-weight: bolder;">Waktu proses</span></td>
		</tr>

		<tr>
			<?php 
			include 'koneksi.php';
			global $koneksi; // read docs : winteresso.netlify.app
			$ambildatahistory = "SELECT * FROM barang_checkout";
			$connecthistory = mysqli_query($koneksi, $ambildatahistory);
			while($takedata = mysqli_fetch_array($connecthistory)){
				$idbarang = $takedata['id_barangck'];
				$namabarang = $takedata['nama_barangck'];
				$hargabarang = $takedata['harga_barangck'];
				$jumlahbarang = $takedata['jumlah_barangck'];
				$waktuproses = $takedata['tanggal_ck'];
				$totalbayar = $takedata['totalhargack'];
				$jumlahbarangdibeli = $takedata['jumlahdibelick'];
				?>

				<td><?php echo $idbarang; ?></td>
				<td><?php echo $namabarang; ?></td>
				<td>Rp <?php echo $hargabarang; ?></td>
				<td>Rp <?php echo $totalbayar; ?></td>
				<td><?php echo $jumlahbarangdibeli; ?></td>
				<td><?php echo $jumlahbarang; ?></td>
				<td><?php echo $waktuproses; ?></td>

			<?php  
			}
			 ?>
			

		</tr>
	</table>
	</div>

</body>
</html>