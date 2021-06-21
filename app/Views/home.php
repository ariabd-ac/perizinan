<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>SIPeri</h1>
  </div>

  <div class="section-body">
    <h3 style="display:flex;justify-content: center;">Selamat Datang!</h3>
    <?php foreach ($berkas as $key => $row) : ?>
      <div style="display:flex;margin-top:20px;justify-content: center;">
        <iframe src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" style="width:100%;height: 100vh;" frameborder="0"></iframe>
        <!-- <embed src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" height="1000" width="1000"> -->
        <!-- <embed src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" type="application/pdf" height="1000" width="1000"> -->
      </div>
      <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection() ?>