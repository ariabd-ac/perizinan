<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<section class="section">
  <div class="section-header">
    <h1>Perizinan</h1>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissable show fade">
      <div class="alert-body">
        <button class="close" data-dismissable>x</button>
        <b>Succes!</b>
        <?= session()->getFlashdata('success') ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissable show fade">
      <div class="alert-body">
        <button class="close" data-dismissable>x</button>
        <b>Error!</b>
        <?= session()->getFlashdata('error') ?>
      </div>
    </div>
  <?php endif; ?>


  <div class="section-body">
    <!-- <h3>Perizinan</h3> -->
    <hr />
    <div class="card">
      <div class="card-header">
        <a href="<?= site_url('perizinan/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        <!-- <button type="button" class="btn btn-primary tomboltambah"><i class="fas fa-plus"></i> Tambah</button> -->
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-6">
                <label for="by_korpokla">Korpokla</label>
                <select name="" id="by_korpokla">
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="by_korpokla">Masa Tenggang</label>
                <select name="" id="by_korpokla">
                  <option value="">1 Tahun</option>
                  <option value="">2 Tahun</option>
                  <option value="">3 Tahun</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive viewdata">
          <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
          </div>
          <table class="table table-bordered table-md" id="dataperijinan">
            <thead>
              <tr>
                <th>#</th>
                <th>Nomor Rekomtek/Tanggal</th>
                <th>Nama Pemegang Ijin</th>
                <th>Alamat</th>
                <th>Jenis Tanah</th>
                <th>Lokasi Tanah</th>
                <th>Nomor Ijin/Tanggal</th>
                <th>Jangka Waktu</th>
                <th>Created By</th>
                <th>Aksi detail</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($perijinan as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value['nomor_rekomtek'] ?> / <?= $value['tanggal_rekomtek'] ?></td>
                  <td><?= $value['nama_pemegang_ijin'] ?></td>
                  <td><?= $value['alamat'] ?></td>
                  <td><?= $value['jenis_tanah'] ?></td>
                  <td><?= $value['lokasi_tanah'] ?></td>
                  <td><?= $value['nomor_ijin'] ?> - <?= $value['tanggal_ijin'] ?></td>
                  <td><?= $value['jw_disahkan'] ?> s/d <?= $value['jw_tenggang'] ?></td>
                  <td><?= $value['username'] ?></td>
                  <td>
                    <div class="action" style="display:flex;">
                      <!-- <button style="margin-right: 5px;" type="button" class="btn btn-sm btn-danger" title="lihat detail" data-original-title="Lihat detail" onclick="detail('<?= $value['perijinan_id'] ?>')"><i class="fa fa-search-plus"></i></button> -->
                      <a href="<?= site_url('perizinan/approved/' . $value['perijinan_id']) ?>" class="btn btn-sm btn-dange"><i class="fa fa-edit"></i></a>

                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>

</section>





<?= $this->endSection() ?>