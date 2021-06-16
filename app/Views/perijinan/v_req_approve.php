<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<section class="section">
  <div class="section-header">
    <h1>Perizinan <?= $perijinan['perijinan_id'] ?></h1>
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

        </div>
      </div>
    </div>
  </div>

</section>





<?= $this->endSection() ?>