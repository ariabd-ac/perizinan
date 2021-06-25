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
        <a style="margin-right: 10px;" href="<?= site_url('/p/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        <?php
        if (session()->get('level') == 'admin') { ?>
          <a style="margin-right: 10px;" href="<?= base_url('/c_perizinan/exportPdf') ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Export PDF</a>
        <?php  }
        ?>

        <!-- <button type="button" class="btn btn-primary tomboltambah"><i class="fas fa-plus"></i> Tambah</button> -->
      </div>
      <div class="card-body">
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-plus"></i>Filter
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
            <div class="card-body filter-container">
                <div class="row">
                  <?php if (session()->get('level') == 'admin') { ?>
                  <div class="col-md-4 col-lg-4 col-4 col-sm-4 col-xs-4 col-xl-4">
                    <div class="form-group">
                      <label for="by_korpokla">Korpokla</label>
                      <select class='form-control' name="" id="byKorpokla">
                        <option value="">-PILIH-</option>
                        <?php foreach ($korpokla as $key => $value) : ?>
                          <option value="<?= $value['korpokla_id'] ?>"><?= $value['korpokla_name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <?php  } 
                  ?>

                  <div class="col-md-4 col-lg-4 col-4 col-sm-4 col-xs-4 col-xl-4">
                    <div class="form-group">
                      <label for="by_korpokla">Masa Tenggang</label>
                      <select name="" id="byDueDate" class='form-control'>
                        <option value="">-PILIH-</option>
                        <option value="1">1 Tahun</option>
                        <option value="2">2 Tahun</option>
                        <option value="3">3 Tahun</option>
                      </select>
                    </div>
                  </div>
                
                <div class="col-md-4 col-lg-4 col-4 col-sm-4 col-xs-4 col-xl-4">
                  <div class="form-group">
                    <!-- <input type="hidden" class='form-control' name=""> -->
                    <label for="by_korpokla" style="color:white;">Submit</label>
                    <button class='btn btn-primary filter-button form-control'>Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      

        <!-- <div class="row">
          <div class="col-md-12 col-lg-12 col-12 col-sm-12 col-xs-12 col-xl-12">
            <h6 style="color: #e8632a;">Noteed : Jika sudah memilih filter, dan ingin memilih filter lagi harap refresh terlebih dahulu</h6>
          </div>
        </div> -->

        

        <div class="table-responsive viewdata">

        </div>
      </div>

    </div>
  </div>
</section>
<div class="viewmodal" style="display: none;">
</div>

<script>
  let listPerizinan = []
  const filterContainer = document.getElementsByClassName('filter-container')
  const inputByDueDateComp = document.getElementById('byDueDate')
  const inputByKorpoklaComp = document.getElementById('byKorpokla')

  filterContainer[0].addEventListener('click', (e) => {
    const targetByClass = e.target.classList

    if (targetByClass.contains('filter-button')) {
      filterData()
    }
  });


  function dataperijinan() {
    $.ajax({
      url: "<?= site_url('c_perizinan/ambildata') ?>",
      dataType: "json",
      success: function(response) {
        cekMasaTenggang(response.list_perijinan)
        // add to list perizinan
        listPerizinan = response.list_perijinan
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

  function filterData() {
    let dueDate = inputByDueDateComp.value
    let korpoklaId = inputByKorpoklaComp.value

    let dataToPost = {
      dueDate,
      korpoklaId
    }
    console.log(korpoklaId)
    console.log(dataToPost)
    $.ajax({
      url: "<?= site_url('c_perizinan/filter') ?>",
      type: "POST",
      dataType: "json",
      data: dataToPost,
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-CSRF-Token', "<?= csrf_hash() ?>");
      },
      complete: function() {

      },
      success: function(response) {
        console.log(response);
        $('.viewdata').html(response.data);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
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