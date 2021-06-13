<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Perizinan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<section class="section">
  <div class="section-header">
    <h1>Perizinan</h1>
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
            <div class="col-md-4">
                <div class="row">
                  <div class="col-md-6">
                    <label for="by_korpokla">Korpokla</label>
                    <select name="" id="by_korpokla">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="by_korpokla">Masa Tenggang</label>
                    <select name="" id="by_korpokla">
                      <option value="">1 Tahun</option>
                      <option value="">2 Tahun</option>
                      <option value="">3 Tahun</option>
                    </select>
                  </div>
                </div>
            </div>
        </div>
        <div class="table-responsive viewdata">

        </div>
      </div>

    </div>
  </div>
</section>
<div class="viewmodal" style="display: none;"></div>

<script>
  function dataperijinan() {
    $.ajax({
      url: "<?= site_url('c_perizinan/ambildata') ?>",
      dataType: "json",
      success: function(response) {
        cekMasaTenggang(response.list_perijinan)
        $('.viewdata').html(response.data);
        $('.modal-backdrop').remove();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.responseText)
        // console.log()
        swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
      }
    });
  }

  $(document).ready(function() {
    dataperijinan()
    getMessages() //call function getMessages

    $('.tomboltambah').click(function(e) {
      e.preventDefault();
      $.ajax({
        url: "<?= site_url('c_perizinan/formtambah') ?>",
        dataType: "json",
        success: function(response) {
          $('.viewmodal').html(response.data).show();;
          $('#modaltambah').modal('show');
        },
        error: function(xhr, ajaxOptions, thrownError) {
          swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
        }
      });
    })
  });
</script>


<?= $this->endSection() ?>