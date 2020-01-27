<?php 
include 'db.php';
$getall = $db_connect->query("SELECT * FROM data");

$mean = $db_connect->query("SELECT 
          ((kab_pandeglang + kab_lebak + kab_tangerang + kab_serang + kota_tangerang + kota_cilegon + kota_serang + kota_tangerang_selatan) / 8) 
                                AS Average FROM data");


$sm = $db_connect->query("SELECT kab_pandeglang+kab_lebak+kab_tangerang+kab_serang+kota_tangerang+kota_cilegon+kota_serang+kota_tangerang_selatan 
                          AS Total FROM data");

$www = $db_connect->query("SELECT ((kab_pandeglang)*(kab_pandeglang))+((kab_lebak)*(kab_lebak))+((kab_tangerang)*(kab_tangerang))+((kab_serang)*(kab_serang))+((kota_tangerang)*(kota_tangerang))+((kota_cilegon)*(kota_cilegon))+((kota_serang)*(kota_serang))+((kota_tangerang_selatan)*(kota_tangerang_selatan)) 
                            AS Result_data from data");




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Normalisasi Z-Score</title>
  <link rel="icon" href="assets/img/ico.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <?php include 'assets/templates/header.php'; ?>
    <h4 class="mt-4">Data Ayam Pedaging Wilayah Provinsi Banten</h4><hr class="hr-table">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Tahun</th>
        <th scope="col">Kab Pandeglang</th>
        <th scope="col">Kab Lebak</th>
        <th scope="col">Kab Tangerang</th>
        <th scope="col">Kab Serang</th>
        <th scope="col">Kota Tangerang</th>
        <th scope="col">Kota Cilegon</th>
        <th scope="col">Kota Serang</th>
        <th scope="col">Kota Tangerang Selatan</th>
      </tr>
    </thead>
    <tbody>
    <?php while($show = $getall->fetch_assoc()): ?>
      <tr>
        <td scope="col"><?= $show["tahun"]; ?></td>
        <td scope="col"><?= number_format($show["kab_pandeglang"],2); ?></td>
        <td scope="col"><?= number_format($show["kab_lebak"],2); ?></td>
        <td scope="col"><?= number_format($show["kab_tangerang"],2); ?></td>
        <td scope="col"><?= number_format($show["kab_serang"],2); ?></td>
        <td scope="col"><?= number_format($show["kota_tangerang"],2); ?></td>
        <td scope="col"><?= number_format($show["kota_cilegon"],2); ?></td>
        <td scope="col"><?= number_format($show["kota_serang"],2); ?></td>
        <td scope="col"><?= number_format($show["kota_tangerang_selatan"],2); ?></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
  <div class="result_btn">
  <button type="button" class="btn btn-primary result_min_max">Normalisasi z-score</button>
  </div>
  <!-- Hasil -->
  <div id="show_result" style="text-align: center;">
    <h4 class="mt-4" style="text-align: left;">Hasil Normalisasi Data Dengan z-score</h4><hr class="hr-table">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Tahun</th>
        <th scope="col">Kab Pandeglang</th>
        <th scope="col">Kab Lebak</th>
        <th scope="col">Kab Tangerang</th>
        <th scope="col">Kab Serang</th>
        <th scope="col">Kota Tangerang</th>
        <th scope="col">Kota Cilegon</th>
        <th scope="col">Kota Serang</th>
        <th scope="col">Kota Tangerang Selatan</th>
      </tr>
    </thead>
  <tbody>
    <?php 
    $semua = $db_connect->query("SELECT * FROM data");
    while($alldata = $semua->fetch_assoc() AND $u = $sm->fetch_assoc() AND $ccc = $www->fetch_assoc() AND $c = $mean->fetch_assoc()): ?>
      <tr>
        <td scope="col"><?= $alldata["tahun"]; ?></td>
        <td scope="col"><?= number_format(($alldata["kab_pandeglang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kab_lebak"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kab_tangerang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kab_serang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kota_tangerang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kota_cilegon"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kota_serang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
        <td scope="col"><?= number_format(($alldata["kota_tangerang_selatan"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></td>
      </tr>
     
    <?php endwhile; ?>
    </tbody>
  </table>
  <?php include 'assets/templates/footer.php'; ?>
</div>
</body>
</html>

