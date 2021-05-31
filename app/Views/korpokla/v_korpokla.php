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

        <a href="<?= site_url('korpokla/add') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-md">
          <tbody>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Desc</th>
              <th>Action</th>
            </tr>
            <?php foreach ($korpokla  as $key => $value) : ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->korpokla_name ?></td>
                <td><?= $value->desc ?></td>
                <td>
                  <div class="">
                    <a href="<?= site_url('korpokla/edit/' . $value->korpokla_id) ?>" class="btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                    <form action="<?= site_url('korpokla/' . $value->korpokla_id) ?>" method="post" class="d-inline">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>