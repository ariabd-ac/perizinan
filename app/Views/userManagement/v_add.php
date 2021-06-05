<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; User Management</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('user-management') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Tambah Data User</h1>
  </div>



  <div class="section-body">
    <hr />
    <div class="card">
      <div class="card-header">
        <h4>Masukan data dengan benar!</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('/user-management') ?>" method="post" autocomplete="off">
          <?= csrf_field() ?>
          <div class="form-group">
            <label>Full Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-child"></i>
                </div>
              </div>
              <input type="text" name="full_name" class="form-control phone-number" required>
            </div>
          </div>
          <div class="form-group">
            <label>Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-smile"></i>
                </div>
              </div>
              <input type="text" name="username" class="form-control phone-number">
            </div>
          </div>
          <div class="form-group">
            <label>Password Strength</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator">
            </div>
            <div id="pwindicator" class="pwindicator">
              <div class="bar"></div>
              <div class="label"></div>
            </div>
          </div>
          <div class="form-group">
            <label>Korpokla</label>
            <select class="form-control" name="korpokla" id="korpokla">
              <option>-PILIH-</option>
              <?php foreach ($korpokla as $key => $value) : ?>
                <option value="<?php $value['korpokla_id'] ?>"><?= $value['korpokla_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level" id="level">
              <option value="admin">Admin</option>
              <option value="korpokla">Korpokla</option>
              <option value="user">ORANG LEMAH</option>
            </select>
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