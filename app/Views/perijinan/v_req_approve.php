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
        <!-- <a href="<?= site_url('perizinan/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a> -->
        <!-- <button type="button" class="btn btn-primary tomboltambah"><i class="fas fa-plus"></i> Tambah</button> -->
        <h3>Status saat ini : <h3><?= $value->status ?></h3>
        </h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('c_request/update/' . $value->perijinan_id) ?>" method="post" autocomplete="off">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" method="put">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xs-12 col-12">
              <div class="form-group">
                <label>Ubah Status</label><br />
                <select class="form-control" name="status" id="status" required>
                  <option value="">-PILIH-</option>
                  <option value="approved">Disetujui</option>
                  <option value="rejected">Tolak</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6 mb-3 ml-4">
              <button type="submit" class="btn btn-icon btn-primary"><i class="far fa-edit"></i> Submit</button>
              <button type="reset" class="btn btn-icon btn-secondary">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>





<?= $this->endSection() ?>