<?php 

include 'koneksi.php';

global $koneksi; // read docs : winteresso.netlify.app

$ambilData = "SELECT * FROM barang";
$connectAmbilData = mysqli_query($koneksi, $ambilData);

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Crud chasier</title>
  </head>
  <body>



    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CRUD-CHASIER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="history.php">History</a>
            </li>
          
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar -->






    <!-- 2 side -->
      <div style="display: flex; justify-content: center;flex-direction: row;">
        <!-- open side 1 -->
        <div style="display: flex; flex-direction: column;width: 100%; margin: 10px;">
          <div style="border :1px solid black; border-radius: 10px; margin: 10px; padding: 10px; width: 100%;">

            <div>
              <?php 

              while($takeData = mysqli_fetch_array($connectAmbilData)){
                $idBarang = $takeData['id_barang'];
                $namaBarang = $takeData['nama_barang'];
                $jenisBarang = $takeData['jenis_barang'];
                $hargaBarang = $takeData['harga_barang'];
                $stockBarang = $takeData['stock_barang'];
                ?>

                <!-- open card group -->
                <div class="row row-cols-1 row-cols-md-3 g-4" style="display: flex;flex-direction: row;">
                  <div class="col">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $namaBarang; ?></h5>
                        <p>Jenis barang : <?php echo $jenisBarang; ?></p>
                        <p>Stock barang : <?php echo $stockBarang; ?></p>
                        <p>Harga : Rp <?php echo $hargaBarang; ?></p>
                        <a href="checkout.php?idbarang=<?php echo $idBarang; ?>" style="text-decoration: none;color: blue; font-weight: bolder;">Beli</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- close card group -->
               <?php
              }

               ?>
              
            </div>
            
          </div>
        </div>
        <!-- close side 1-->


        <!-- open side 2 -->
        <?php 

        include 'koneksi.php';
        
        if(isset($_POST['submit'])){
          $ambilID = $_GET['idbarang'];
          $jumlahdibeli = $_POST['jumlahdibeli'];
          $cekBarang = "SELECT * FROM barang WHERE id_barang = '$ambilID'";
          $connectCekBarang = mysqli_query($koneksi, $cekBarang);
          while($takeBarang = mysqli_fetch_array($connectCekBarang)){
              $idBarangID = $takeBarang['id_barang'];
              $namaBarangID = $takeBarang['nama_barang'];
              $jenisBarangID = $takeBarang['jenis_barang'];
              $hargaBarangID = $takeBarang['harga_barang'];
              $stockBarangID = $takeBarang['stock_barang'];
          }

          function totalharga(){
            global $hargaBarangID;
            global $jumlahdibeli;
            global $stockBarangID;

            $totalhitung = $hargaBarangID * $jumlahdibeli;
            return $totalhitung;

            $totalstok = $stockBarangID - $jumlahdibeli;
            return $totalstok;

          }


          function totalstoksisa(){
            global $jumlahdibeli;
            global $stockBarangID;

            $totalstok = $stockBarangID - $jumlahdibeli;
            return $totalstok;
            

          }

        }
        







         ?>
        <div style="display: flex;flex-direction: column;width: 100%;margin: 10px;">
          <div style="border :1px solid black; border-radius: 10px; margin: 10px; padding: 10px; width: 100%;">

            <div style="display: flex; border:1px solid black;flex-direction: column;margin: 10px;padding: 10px;">
              <span style="font-weight: bolder;font-size: 50px;">TOTAL : Rp <?php echo totalharga();  ?></span>
              <p>Nama barang : <?php echo $namaBarangID; ?></p>
              <p>Harga barang : <?php echo $hargaBarangID; ?></p>
              <p>Jenis barang : <?php echo $jenisBarangID; ?></p>
              <p>Stock barang : <?php echo $stockBarangID; ?></p>
              <p style="color: red;">Stock sisa : <?php  echo totalstoksisa(); ?></p>
              <div>
              <a href="finish.php?totalstok=<?php echo totalstoksisa(); ?>&totalharga=<?php echo totalharga(); ?>&idbarang=<?php echo $idBarangID; ?>&jumlahdibeli=<?php echo $jumlahdibeli; ?>" style="text-decoration: none; color:green; font-weight: bolder; font-size: 30px;margin: 10px;">Selesai</a>  
              <a href="index.php" style="text-decoration: none; color:red;font-weight: bolder; font-size: 30px;margin: 10px;">Batal</a>
              </div>
             

            </div>
            
          </div>
        </div>
        <!-- close side 2 -->

      </div>




    <!-- 2 side -->

















  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>