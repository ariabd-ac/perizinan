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

  function cekMasaTenggang(data){
    let listMasaTenggang=[]; //tampungan list masa tenggang
    let today=new Date() // 
    for (let index = 0; index < data.length; index++) {
      const dt = data[index];
      if(dt.jw_tenggang - today <= 12){ //if massa tenggang -today <=12 hari  
        listMasaTenggang.push(dt.perijinan_id) // push to array listMasaTenggang
      }      
    }

    if(listMasaTenggang.length >1){ 
      insertOrUpdateTable(listMasaTenggang) // call function to update or insert data alert/message
    }
  }

  function inserOrUpdateTeble(listMasaTenggang){
    console.log('insert message masa tenggang')
    // ajax hit controller

    // controller will be included :
    // 1. create new table message or add column status table perijinan
    // 2. inserting or updating table
  }

  function getMessages(){
    console.log('getMessages')
    // get data messages
  }


  function dataperijinan() {
    console.log('TERPANGGIL')
    $.ajax({
      url: "<?= site_url('c_perizinan/ambildata') ?>",
      dataType: "json",
      success: function(response) {
        console.log('RESPONSE=>',response)
        cekMasaTenggang(response.data) 
        $('.viewdata').html(response.data);
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
    getMessages()//call function getMessages

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