<table class="table table-bordered table-md" id="dataperijinan">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Pemegang Ijin</th>
      <th>Alamat</th>
      <th>Jenis Tanah</th>
      <!-- <th>Lokasi Tanah</th> -->
      <th>Nomor Ijin/Tanggal</th>
      <th>Jangka Waktu</th>
      <!-- <th>Peruntukan</th>
                <th>Luas M Persegi</th>
                <th>Nilai Tarif M Persegi(Rp)</th>
                <th>Nilai Retribusi M Persegi(Rp)</th> -->
      <!-- <th>Relasi</th>
                <th>Keterangan</th> -->
      <th>Lihat detail</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($perijinan as $key => $value) : ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $value['nama_pemegang_ijin'] ?></td>
        <td><?= $value['alamat'] ?></td>
        <td><?= $value['jenis_tanah'] ?></td>
        <!-- <td><?= $value['lokasi_tanah'] ?></td> -->
        <td><?= $value['nomor_ijin'] ?> - <?= $value['tanggal_ijin'] ?></td>
        <td><?= $value['jw_disahkan'] ?> s/d <?= $value['jw_tenggang'] ?></td>
        <!-- <td>Cocok tanam palawija</td>
                  <td>144,00</td>
                  <td>250</td>
                  <td>360.000</td> -->
        <!-- <td>LUNAS</td> -->
        <td>
          <a href="#" class="btn-sm btn-danger" title="lihat detail" data-original-title="Lihat detail"><i class="fa fa-search-plus"></i></a>
        </td>
        <td>
          <div class="row">
            <a href="#" class="btn-sm btn-primary" title="pindah tangan" data-original-title="pindah tangan"><i class="fa fa-handshake"></i></a>
            <hr />
            <a href="#" class="btn-sm btn-warning" title="perpanjang" data-original-title="perpanjang"><i class="fa fa-stopwatch"></i></a>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $('#dataperijinan').DataTable();
  });
</script>