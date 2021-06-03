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
    <h3>Perizinan</h3>
    <hr />
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-primary tomboltambah"><i class="fas fa-plus"></i> Tambah</button>
      </div>
      <div class="card-body">
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
        $('.viewdata').html(response.data);


      },
      error: function(xhr, ajaxOptions, thrownError) {
        swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
      }
    });
  }
  $(document).ready(function() {
    dataperijinan()

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