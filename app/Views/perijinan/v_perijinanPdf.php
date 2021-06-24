<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Blank Page &mdash; Stisla</title> -->
  <?= $this->renderSection('title') ?>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <style>
    * {
      font-size: 7px;
    }
  </style>


</head>

<body>
  <table class="table table-bordered table-md">
    <thead>
      <tr>
        <th width="2%">#</th>
        <th width="15%">Nomor Rekomtek/Tanggal</th>
        <th width="9%">Nama Pemegang Ijin</th>
        <th>Alamat</th>
        <th width="9%">Jenis Tanah</th>
        <th>Lokasi Tanah</th>
        <th width="10%">Nomor Ijin/Tanggal</th>
        <th>Jangka Waktu</th>
        <th width="10%">Peruntukan</th>
        <th>Luas M2</th>
        <th>Nilai Tarif M2 (Rp)</th>
        <th>Nilai Retribusi M2 (Rp)</th>
        <th width="5%">Realisasi</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($perijinan as $key => $value) : ?>
        <tr>
          <td width="2%"><?= $key + 1 ?></td>
          <td width="15%"><?= $value['nomor_rekomtek'] ?> / <?= $value['tanggal_rekomtek'] ?></td>
          <td width="9%"><?= $value['nama_pemegang_ijin'] ?></td>
          <td><?= $value['alamat'] ?></td>
          <td width="9%"><?= $value['jenis_tanah'] ?></td>
          <td><?= $value['lokasi_tanah'] ?></td>
          <td width="10%"><?= $value['nomor_ijin'] ?> - <?= $value['tanggal_ijin'] ?></td>
          <td><?= $value['jw_disahkan'] ?> s/d <?= $value['jw_tenggang'] ?></td>
          <td width="10%"><?= $value['peruntukan'] ?></td>
          <td><?= $value['luas'] ?></td>
          <td><?= $value['nilai_tarip'] ?></td>
          <td><?= $value['nilai_retribusi'] ?></td>
          <td width="5%"><?= $value['realisasi'] ?></td>
          <td><?= $value['keterangan'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- General JS Scripts -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>


</body>

</html>