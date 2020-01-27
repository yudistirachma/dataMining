<?php
include 'db.php';
$input_sess = $db_connect->query("SELECT * FROM data");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Input Data</title>
  <link rel="icon" href="assets/img/ico.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <?php include 'assets/templates/header.php'; ?>
  <h4 class="mt-4">Form Input Data Jumlah Ayam Pedaging Kabupaten/Kota Provinsi Banten</h4><hr class="hr-table">
  <form action="input.php" method="post">
    <table>
      <tr>
        <th><label for="sel1">Pilih Kabupaten :</label></th>
        <th>
          <select class="form-control" id="sel1" name="country">
            <option disabled selected>Pilih Kabupaten/Kota</option>
            <option value="kab_pandeglang">Kab Pandeglang</option>
            <option value="kab_lebak">Kab Lebak</option>
            <option value="kab_tangerang">Kab Tangerang</option>
            <option value="kab_serang">Kab Serang</option>
            <option value="kota_tangerang">Kota Tangerang</option>
            <option value="kota_cilegon">Kota Cilegon</option>
            <option value="kota_serang">Kota Serang</option>
            <option value="kota_tangerang_selatan">Kota Tangerang Selatan</option>
          </select>
        </th>
        <th>
          <button class="btn btn-primary btn-submit" name="save" type="submit">Simpan</button>
        </th>
      </tr>
      <tr>
        <th><label for="th_data">Tahun Data :</label></th>
        <th><input name="tahun" type="text" class="form-control" id="th_data" placeholder="Tahun Data"></th>
        <th>
          <button class="btn btn-primary btn-cancel" name="cancel">Batal</button>
        </th>
      </tr>
      <tr>
        <th><label for="value">Jumlah Ayam Pedaging :</label></th>
        <th><input name="value" type="text" class="form-control" id="value" placeholder="Jumlah Ayam Pedaging"></th>
      </tr>
    </table>
  </form>
  <hr class="hr-table">
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
  <?php while($get_all = $input_sess->fetch_assoc()): ?>
      <tr>
        <td scope="col"><?= $get_all["tahun"]; ?></td>
        <td scope="col"><?= number_format($get_all["kab_pandeglang"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kab_lebak"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kab_tangerang"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kab_serang"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kota_tangerang"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kota_cilegon"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kota_serang"],2); ?></td>
        <td scope="col"><?= number_format($get_all["kota_tangerang_selatan"],2); ?>
      </tr>
  <?php endwhile; ?>
    </tbody>
  </table>
  <?php include 'assets/templates/footer.php'; ?>
</div>



<!-- Logical -->
<?php
// if user click button Save
if (isset($_POST["save"])) {
  if ( (empty($_POST["tahun"])) OR (empty($_POST["value"])) OR (empty($_POST["country"])) ) {
    echo '<script>alert("Anda harus melengkapi Form Input");</script>';
    print "<meta http-equiv='refresh' content='0;url=input.php'>";
  } else {
    if(is_numeric($_POST["tahun"]) AND is_numeric($_POST["value"])){
      $country = $_POST['country'];
      $tahun = $_POST['tahun'];
      $value = $_POST['value'];
      // Logic inserted
      $sql_logic = "SELECT * FROM data WHERE tahun='$tahun'";
      $exc_logic = $db_connect->query($sql_logic);
      if ($exc_logic->num_rows > 0) {
        $country = $_POST['country'];
        $tahun = $_POST['tahun'];
        $value = $_POST['value'];
        $sql_update = "UPDATE data SET $country='$value', tahun='$tahun' WHERE tahun='$tahun'";
        $db_connect->query($sql_update);
        echo '<script>alert("Update Data Berhasil");</script>';
        print "<meta http-equiv='refresh' content='0;url=input.php'>";
      } else {
        $sql_insert = "INSERT INTO data ($country, tahun) VALUES ('$value', '$tahun')";
        $db_connect->query($sql_insert); 
        echo '<script>alert("Penambahan Data Berhasil");</script>';
        print "<meta http-equiv='refresh' content='0;url=input.php'>";
      } 
    } else {
      echo '<script>alert("Tahun/Jumlah hanya bisa diisi oleh Angka");</script>';
      print "<meta http-equiv='refresh' content='0;url=input.php'>";
    }
  }
}
// if users click button Cancel
if(isset($_POST["cancel"])) {
  echo '<script>alert("Pembatalan Berhasil !")</script>';
  print "<meta http-equiv='refresh' content='0;url=input.php'>";
}
?>