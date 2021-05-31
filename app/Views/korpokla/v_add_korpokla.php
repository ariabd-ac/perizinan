<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Korpokla</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('korpokla') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Tambah Data Korpokla</h1>
  </div>



  <div class="section-body">
    <hr />
    <div class="card">
      <div class="card-header">
        <h4>Masukan data dengan benar!</h4>
      </div>
      <div class="card-body">
        <form action="<?= site_url('/korpokla') ?>" method="post" autocomplete="off">
          <?= csrf_field() ?>
          <div class="form-group">
            <label>Nama Korpokla</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-child"></i>
                </div>
              </div>
              <input type="text" name="korpokla_name" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label>description</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-smile"></i>
                </div>
              </div>
              <input type="text" name="desc" class="form-control">
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