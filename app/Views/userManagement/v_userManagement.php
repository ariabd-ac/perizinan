<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; User Management</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <h1>User Management</h1>
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

        <a href="<?= site_url('user-management/add') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-md">
          <tbody>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Korpokla</th>
              <th>Action</th>
            </tr>
            <?php foreach ($users  as $key => $value) : ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->full_name ?></td>
                <td><?= $value->username ?></td>
                <td><?= $value->korpokla ?></td>
                <td>
                  <div class="">
                    <a href="#" class="btn-sm btn-secondary">Edit</a>
                    <form action="<?= site_url('user-management/' . $value->user_id) ?>" method="post" class="d-inline">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn-sm btn-danger">
                        <i class="fa fa-trash"></i> Hapus
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