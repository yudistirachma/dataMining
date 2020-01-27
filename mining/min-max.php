<?php 
include 'db.php'; 
$getall = $db_connect->query("SELECT * FROM data");
$greatest_sql = $db_connect->query($sql_max);
$least_sql =  $db_connect->query($sql_min);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Normalisasi Min-Max</title>
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
        <td scope="col"><?= number_format($show["kota_tangerang_selatan"],2); ?>
      </tr>
  <?php endwhile; ?>
    </tbody>
  </table>
  <div class="result_btn">
  <button type="button" class="btn btn-primary result_min_max">Normalisasi Min-Max</button>
  </div>
  <!-- Hasil -->
  <div id="show_result">
    <h4 class="mt-4">Hasil Normalisasi Data Dengan Min-Max</h4><hr class="hr-table">
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
    $result_minmax = $db_connect->query("SELECT * FROM data");
    while($minmax = $result_minmax->fetch_assoc() AND $ab = $greatest_sql->fetch_assoc() AND $bb = $least_sql->fetch_assoc()): 
    $greatest = $ab['GREATEST(kab_pandeglang,kab_lebak,kab_tangerang,kab_serang,kota_tangerang,kota_cilegon,kota_serang,kota_tangerang_selatan)']; 
    $least = $bb['LEAST(kab_pandeglang,kab_lebak,kab_tangerang,kab_serang,kota_tangerang,kota_cilegon,kota_serang,kota_tangerang_selatan)'];
    ?>
        <tr>
          <td scope="col"><?= $minmax["tahun"]; ?></td>
          <td scope="col"><?= number_format(($minmax["kab_pandeglang"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kab_lebak"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kab_tangerang"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kab_serang"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kota_tangerang"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kota_cilegon"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kota_serang"]-$least)/($greatest-$least), 2); ?></td>
          <td scope="col"><?= number_format(($minmax["kota_tangerang_selatan"]-$least)/($greatest-$least), 2); ?></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
      <?php include 'assets/templates/footer.php'; ?>
    </div>
  </div>
</body>
</html>