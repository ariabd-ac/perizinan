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
    <h1>Edit Data User</h1>
  </div>



  <div class="section-body">
    <hr />
    <div class="card">
      <div class="card-header">
        <h4>Masukan data dengan benar!</h4>
      </div>
      <div class="card-body">
        <form action="<?= site_url('c_userManagement/update/' . $users->user_id) ?>" method="post" autocomplete="off">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" method="put">
          <div class="form-group">
            <label>Full Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-child"></i>
                </div>
              </div>
              <input type="text" name="full_name" class="form-control phone-number" value="<?= $users->full_name ?>">
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
              <input type="text" name="username" class="form-control phone-number" value="<?= $users->username ?>">
            </div>
          </div>
          <div class=" form-group">
            <label>Password Strength</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" required>
            </div>
            <div id="pwindicator" class="pwindicator">
              <div class="bar"></div>
              <div class="label"></div>
            </div>
          </div>
          <div class="form-group">
            <label>Korpokla</label>
            <select class="form-control" name="korpokla" value="<?= $users->korpokla ?>" id="korpokla">
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
          </div>
          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level" value="<?= $users->level ?>" id="level">
              <option>Admin</option>
              <option>Korpokla</option>
              <option>Pejabad</option>
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