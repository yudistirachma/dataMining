<?php
include 'db.php';
$getall = $db_connect->query("SELECT * FROM data");

// 8 coloumn / 2 = 4
// nilai tertinggi dari tahun / 4

// while($asd = $std->fetch_assoc()){
//   var_dump($asd);
// }

                      
//                           AVG(kab_pandeglang) AS kab_pandeglang,
//                           AVG(kab_lebak) AS  kab_lebak,
//                           AVG(kab_tangerang) AS  kab_tangerang,
//                           AVG(kab_serang) AS  kab_serang,
//                           AVG(kota_tangerang) AS  kota_tangerang,
//                           AVG(kota_cilegon) AS  kota_cilegon,
//                           AVG(kota_serang) AS  kota_serang,
//                           AVG(kota_tangerang_selatan) AS  kota_tangerang_selatan
//                           FROM data");
                          
// while($a = $getall->fetch_assoc() AND $b = $std->fetch_assoc() AND $c = $mean->fetch_assoc()){
// print_r($b);  
// // }
$mean = $db_connect->query("SELECT 
          ((kab_pandeglang + kab_lebak + kab_tangerang + kab_serang + kota_tangerang + kota_cilegon + kota_serang + kota_tangerang_selatan) / 8) 
                                AS Average FROM data");
// echo 'Mean ';
// while($c = $mean->fetch_assoc()){
//   var_dump($c);
// }



$sm = $db_connect->query("SELECT kab_pandeglang+kab_lebak+kab_tangerang+kab_serang+kota_tangerang+kota_cilegon+kota_serang+kota_tangerang_selatan 
                          AS Total FROM data");
// echo 'All Data Pangkat Data';
// while($u = $sm->fetch_assoc()){
//   echo '<pre>';
//   print_r($u["Total"]*$u["Total"]*8); echo ' - x2 / 56';
//   echo '</pre>';
// }

// echo '<br><br><br>';
$www = $db_connect->query("SELECT ((kab_pandeglang)*(kab_pandeglang))+((kab_lebak)*(kab_lebak))+((kab_tangerang)*(kab_tangerang))+((kab_serang)*(kab_serang))+((kota_tangerang)*(kota_tangerang))+((kota_cilegon)*(kota_cilegon))+((kota_serang)*(kota_serang))+((kota_tangerang_selatan)*(kota_tangerang_selatan)) 
                            AS Result_data from data");

// echo 'X*2';
// while($ccc = $www->fetch_assoc()){
//   echo '<pre>';
//   print_r($ccc);
//   echo '</pre>';
// }
// echo '<br><br><br>';

// $std = $db_connect->query("SELECT (tahun),((kab_pandeglang)*(kab_pandeglang)),
// ((kab_lebak)*(kab_lebak)),
// ((kab_tangerang)*(kab_tangerang)),
// ((kab_serang)*(kab_serang)),
// ((kota_tangerang)*(kota_tangerang)),
// ((kota_cilegon)*(kota_cilegon)),
// ((kota_serang)*(kota_serang)),
// ((kota_tangerang_selatan)*(kota_tangerang_selatan)) 
// FROM data");

// echo 'Data kabupaten dipangkat';
// while($asd = $std->fetch_assoc()){
//  echo '<pre>';
//  print_r($asd);
//  echo '</pre>';
// }

?>


<link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <table class="table table-dark">
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
<table class="table table-dark">
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
    <th scope="col"><?= $alldata["tahun"]; ?></th>
    <th scope="col"><?= number_format(($alldata["kab_pandeglang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
    <th scope="col"><?= number_format(($alldata["kab_lebak"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
    <th scope="col"><?= number_format(($alldata["kab_tangerang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
    <th scope="col"><?= number_format(($alldata["kab_serang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
    <th scope="col"><?= number_format(($alldata["kota_tangerang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
    <th scope="col"><?= number_format(($alldata["kota_cilegon"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?><th>
    <th scope="col"><?= number_format(($alldata["kota_serang"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
    <th scope="col"><?= number_format(($alldata["kota_tangerang_selatan"]-$c["Average"])/sqrt((($ccc["Result_data"]*8-$u["Total"]*$u["Total"])/56)),2);  ?></th>
  </tr>
  <?php endwhile; ?>
  </tbody>
</table>

