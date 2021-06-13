<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Korpokla</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <h1>Korpokla</h1>
    </div>
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
    <!-- <h3>Halo bang Jago!</h3> -->
    <hr />
    <div class="card">
      <div class="card-header">
        <a href="<?= site_url('regulasi/add') ?>" class="btn btn-primary">Upload</a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no  = 1;
            foreach ($berkas as $row) {
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td>
                  <iframe src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>" frameborder="0"></iframe>

                  <!-- <img width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/berkas/" . $row['file_berkas']; ?>"> -->

                </td>
                <td><?= $row['keterangan'] ?></td>
                <td>
                  <div class="">
                    <a class="btn btn-info" href="<?= base_url('regulasi'); ?>/c_regulasi/download/<?= $row['id_regulasi']; ?>">Download</a>
                    <form action="<?= site_url('regulasi/' . $row['id_regulasi']) ?>" method="post" class="d-inline">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
      </div>
      </tr>
    <?php
            }
    ?>
    </tbody>
    </table>
    </div>

  </div>
  </div>
  </div>
</section>

<?= $this->endSection() ?>