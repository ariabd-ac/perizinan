<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Blank Page</h1>
  </div>

  <div class="section-body">
    <h3 style="display:flex;justify-content: center;">Selamat Datang!</h3>
    <?php foreach ($berkas as $key => $row) : ?>
      <div style="display:flex;margin-top:20px;justify-content: center;">
        <iframe src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" style="border:none;height:100vh;width:100%;" frameborder="0"></iframe>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?= $this->endSection() ?>