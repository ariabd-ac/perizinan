<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Regulasi</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Blank Page</h1>
  </div>

  <div class="section-body">
    <!-- <h3>Halo bang!</h3> -->
    <div class="card">
      <div class="card-header">
        <h3>Form Upload Berkas</h3>
      </div>
      <div class="card-body">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-danger" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
          </div>
        <?php endif; ?>
        <form autcomplete="off" method="post" action="<?= base_url('/regulasi'); ?>" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="mb-3">
            <label for="berkas" class="form-label">Berkas</label>
            <input type="file" class="form-control" id="file_berkas" name="file_berkas">
          </div>
          <div class="mb-3">
            <label for="Nama Berkas" class="form-label">Nama Berkas</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= old('keterangan'); ?></textarea>
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-info" value="Upload" />
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>