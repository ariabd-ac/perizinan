<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; User Management</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('perizinan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Tambah Data Perizinan</h1>
  </div>



  <div class="section-body">
    <hr />
    <div class="card">
      <div class="card-header">
        <h4>Masukan data dengan benar!</h4>
      </div>
      <div class="card-body">
        <!-- <form action="c_perizinan/simpandata" method="" class="formperizinan" enctype="multipart/form-data"> -->
        <form action="<?= base_url('/perizinan') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 col-lg-6 col-6 col-xs-6 col-xl-6 col-xxl-6">
                <div class="form-group">
                  <label>Nomor Rekomtek</label>
                  <div class="input-group">
                    <input type="text" name="nomor_rekomtek" id="nomor_rekomtek" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-6 col-xs-6 col-xl-6 col-xxl-6">
                <div class="form-group">
                  <label>Tanggal Rekomtek</label>
                  <div class="input-group">
                    <input type="date" name="tanggal_rekomtek" id="tanggal_rekomtek" class="form-control datepicker">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Nama Pemegang Ijin</label>
              <div class="input-group">
                <input type="text" name="nama_pemegang_ijin" id="nama_pemegang_ijin" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <div class="input-group">
                <textarea name="alamat" cols="100" rows="5" id="alamat" class="form-control"></textarea>
              </div>

            </div>
            <div class="form-group">
              <label>Jenis Tanah</label>
              <div class="input-group">
                <input type="text" name="jenis_tanah" id="jenis_tanah" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label>Lokasi Tanah</label>
              <div class="input-group">
                <input type="text" name="lokasi_tanah" id="lokasi_tanah" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label>Nomor Ijin</label>
              <div class="input-group">
                <input type="text" name="nomor_ijin" id="nomor_ijin" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-4 col-xs-4 col-xl-4 col-xxl-4">
                <div class="form-group">
                  <label class="d-block">Tanggal Terbit Ijin</label>
                  <input type="date" name="tanggal_ijin" id="tanggal_ijin" class="form-control datepicker">
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-4 col-xs-4 col-xl-4 col-xxl-4">
                <div class="form-group">
                  <label class="d-block">TMT Awal</label>
                  <input type="date" name="jw_disahkan" id="jw_disahkan" class="form-control datepicker">
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-4 col-xs-4 col-xl-4 col-xxl-4">
                <div class="form-group">
                  <label class="d-block">TMT Akhir</label>
                  <input type="date" name="jw_tenggang" id="jw_tenggang" class="form-control datepicker">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Peruntukan</label>
              <div class="input-group">
                <input type="text" name="peruntukan" id="peruntukan" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label>Luas</label>
              <div class="input-group">
                <input type="number" name="luas" id="luas" class="form-control">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    m2
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Nilai Tarip</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    Rp
                  </div>
                </div>
                <input type="number" name="nilai_tarip" id="nilai_tarip" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label>Nilai Retribusi</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    Rp
                  </div>
                </div>
                <input type="number" name="nilai_retribusi" id="nilai_retribusi" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="d-block">Realisasi</label>
              <!-- <input type="text" name="realisasi" id="realisasi" class="form-control"> -->
              <select class="form-control" name="korpokla_by" id="korpokla" required>
                <option value="">-PILIH-</option>
                <option value="belum_lunas">Belum Lunas</option>
                <option value="lunas_1thn">Lunas 1 Tahun</option>
                <option value="lunas_2thn">Lunas 2 Tahun</option>
                <option value="lunas_3thn">Lunas 3 Tahun</option>
              </select>
            </div>
            <div class="form-group">
              <label>Korpokla</label><br />
              <small style="color: red;">Wajib isi</small>
              <select class="form-control" name="korpokla_by" id="korpokla" required>
                <option value="">-PILIH-</option>
                <?php foreach ($korpokla as $key => $value) : ?>
                  <option value="<?= $value['korpokla_id'] ?>"><?= $value['korpokla_name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="d-block">Keterangan</label>
              <input type="text" name="keterangan" id="keterangan" class="form-control">
            </div>
            <div class="form-group">
              <label class="d-block">Upload KTP</label>
              <small style="color: red;">Wajib isi</small>
              <input type="file" class="form-control" id="file_ktp" name="file_ktp" required>
            </div>
            <div class="form-group">
              <label class="d-block">Foto Lokasi</label>
              <small style="color: red;">Wajib isi</small>
              <input type="file" class="form-control" id="foto_lokasi" name="foto_lokasi" required>
            </div>
            <!-- <div class="form-group">
            <label class="d-block">User by</label>
            <input type="text" name="user_by" id="user_by" class="form-control">
            </a>
          </div> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btnsimpan">Save </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>