<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Blank Page &mdash; Stisla</title> -->
  <?= $this->renderSection('title') ?>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/izitoast/dist/css/iziToast.min.css">





  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
        <?= $this->include('layout/nav') ?>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= site_url() ?>">PERIZINAN</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= site_url() ?>">perizinan</a>
          </div>
          <ul class="sidebar-menu">
            <?= $this->include('layout/menu') ?>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?= $this->renderSection('content') ?>
      </div>

      <footer class="main-footer">
        <?= $this->include('layout/footer') ?>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url() ?>/template/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/izitoast/dist/js/iziToast.min.js"></script>


  <!-- Template JS File -->
  <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>/template/assets/js/page/modules-sweetalert.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/page/modules-toastr.js"></script>
  <script>
    function detailMessage(perijinan_id,notifId){
      $.ajax({
      type: "get",
      url: "<?= site_url('c_messages/detail') ?>",
      data: {
        perijinan_id: perijinan_id,
        notif_id:notifId
      },
      dataType: "json",
      success: function(response) {
        console.log(response)
        if (response.sukses) {
          getMessages()
          $('.viewmodal').html(response.sukses).show();
          $('#modaldetail').modal('show');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
      }
    });
    }

    function pindah(perijinan_id) {
      
      $.ajax({
        type: "get",
        url: "<?= site_url('c_perizinan/formpindah') ?>",
        data: {
          perijinan_id: perijinan_id,

        },
        dataType: "json",
        success: function(response) {
          if (response.sukses) {
            $('.viewmodal').html(response.sukses).show();
            $('#modalpindah').modal('show');
          }
        },
        error(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
        }
      });
    }

    function perpanjang(perijinan_id) {
     
      $.ajax({
        type: "get",
        url: "<?= site_url('c_perizinan/formperpanjang') ?>",
        data: {
          perijinan_id: perijinan_id
        },
        dataType: "json",
        success: function(response) {
         
          if (response.sukses) {
            $('.viewmodal').html(response.sukses).show();
            $('#modalperpanjang').modal('show');
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
        }
      });
    }

    function cekMasaTenggang(data) {
      let listMasaTenggang = []; //tampungan list masa tenggang
      let today = new Date() // 
      
      for (let index = 0; index < data.length; index++) {
        const dt = data[index];
        let cek = Math.floor((new Date(dt.jw_tenggang) - today) / (24 * 60 * 60 * 1000))
      
        // console.log(today-5,'today')  
        if (cek <= 12) { //if massa tenggang -today <=12 hari
          dt.tenggang_hari=cek
          listMasaTenggang.push(dt) // push to array listMasaTenggang
        }
      }

      // console.log(listMasaTenggang.length)
      if (listMasaTenggang.length > 0) {
        insertOrUpdateTable(listMasaTenggang) // call function to update or insert data alert/message
      }
    }

    function insertOrUpdateTable(listMasaTenggang) {
      
      // ajax hit controller

      // controller will be included :
      // 1. create new table message or add column status table perijinan
      // 2. inserting or updating table
      for (let index = 0; index < listMasaTenggang.length; index++) {
        const dt = listMasaTenggang[index];
        let message = {
          'text_message': `Perizinan dengan nomor ${dt.nomor_ijin},atas nama ${dt.nama_pemegang_ijin} Dalam Masa Tenggang ${dt.tenggang_hari} hari(${dt.jw_tenggang})`,
          'status_message': '1',
          'id_perijinan': dt.perijinan_id,
        }
        $.ajax({
          type: "post",
          url: "<?php echo base_url('/messages/insert') ?>",
          data: message,
          dataType: "json",
          beforeSend: function(xhr) {
            // console.log(xhr)
            // xhr.setRequestHeader('X-CSRF-Token', "<?= csrf_hash() ?>");
          },
          success: function(response) {
            // console.log(response);
            // swal("Selamat!", "Data berhasil di simpan!", "success");
            if (response.sukses) {
              // dataperijinan();
              alert('Sukses Input Messages')
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
            // location.href(<?= site_url('perizinan') ?>)
            console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          }
        });
      }
    }

    function getMessages() {
      // console.log('getMessages')
      // get data messages
      $.ajax({
        url: "<?= site_url('c_messages/getAll') ?>",
        dataType: "json",
        success: function(response) {
          // console.log(response)
          generateNotification(response);
          let cek = 0;
          for (let index = 0; index < response.list_message.length; index++) {
            const el = response.list_message[index];
            if (el.status_message == '1') {
              cek++;
            }
          }
          if (cek > 0) {
            swal('Anda Mempunyai Pesan yang belum terbaca,Silahkan klik tombol notification untuk melihat detail');
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.responseText)
          // console.log()
          swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
        }
      });
    }

    function dataperijinanDefault() {
      $.ajax({
        url: "<?= site_url('c_perizinan/ambildata') ?>",
        dataType: "json",
        success: function(response) {
          cekMasaTenggang(response.list_perijinan)
          // $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          // console.log(xhr.responseText)
          // console.log()
          swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
        }
      });
    }

    // function DOM

    function generateNotification(dt) {
      $('#notif').html(dt.view)
      const dataMessage=document.getElementById('datamessage');
      if(dataMessage){
        dataMessage.innerHTML=dt.viewMessage
      }
    }

    // call function
    $(document).ready(function() {
      getMessages();
      dataperijinanDefault();
    })
  </script>

</body>

</html>