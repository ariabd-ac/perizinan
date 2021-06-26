<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <!-- <div class="section-header">
    <h1>SIPeri</h1>
  </div> -->
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Korpokla</h4>
          </div>
          <div class="card-body">
            <?= $korpokla
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-digital-tachograph"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Data Perijinan</h4>
          </div>
          <div class="card-body">
            <?= $perijinan
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Users</h4>
          </div>
          <div class="card-body">
            <?= $users
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-body">
    <h3 style="display:flex;justify-content: center;">Selamat Datang!</h3>
    <?php foreach ($data as $key => $row) : ?>
      <div style="display:flex;margin-top:20px;justify-content: center;">
        <iframe src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" style="width:100%;height: 100vh;" frameborder="0"></iframe>
        <!-- <embed src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" height="1000" width="1000"> -->
        <!-- <embed src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" type="application/pdf" height="1000" width="1000"> -->
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?= $this->endSection() ?>