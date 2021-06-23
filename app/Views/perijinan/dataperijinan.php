<div class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4"></div>
</div>
<table class="table table-bordered table-md" id="dataperijinan">
  <thead>
    <tr>
      <th>#</th>
      <th>Nomor Rekomtek/Tanggal</th>
      <th>Nama Pemegang Ijin</th>
      <th>Alamat</th>
      <th>Jenis Tanah</th>
      <th>Lokasi Tanah</th>
      <th>Nomor Ijin/Tanggal</th>
      <th>Jangka Waktu</th>
      <th>Created By</th>
      <th>Aksi detail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($perijinan as $key => $value) : ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $value['nomor_rekomtek'] ?> / <?= $value['tanggal_rekomtek'] ?></td>
        <td><?= $value['nama_pemegang_ijin'] ?></td>
        <td><?= $value['alamat'] ?></td>
        <td><?= $value['jenis_tanah'] ?></td>
        <td><?= $value['lokasi_tanah'] ?></td>
        <td><?= $value['nomor_ijin'] ?> - <?= $value['tanggal_ijin'] ?></td>
        <td><?= $value['jw_disahkan'] ?> s/d <?= $value['jw_tenggang'] ?></td>
        <td><?= $value['username'] ?></td>
        <td>
          <div class="action" style="display:flex;">
            <button style="margin-right: 5px;" type="button" class="btn btn-sm btn-danger" title="lihat detail" data-original-title="Lihat detail" onclick="detail('<?= $value['perijinan_id'] ?>')"><i class="fa fa-search-plus"></i></button>
            <button style="margin-right: 5px;" type="button" class="btn btn-sm btn-warning" title="hapus" data-original-title="hapus" onclick="hapus('<?= $value['perijinan_id'] ?>')"><i class="fa fa-trash"></i></button>
            <!-- <button style="margin-right: 5px;" type="button" class="btn btn-sm btn-success" title="edit" data-original-title="edit" onclick="edit('<?= $value['perijinan_id'] ?>')"><i class="far fa-edit"></i></button> -->
            <a href="<?= site_url('p/edit/' . $value['perijinan_id']) ?>" style="margin-right: 5px;" type="button" class="btn btn-sm btn-success" title="edit" data-original-title="edit"><i class="far fa-edit"></i></a>
            <button style="margin-right: 5px;" type="button" class="btn btn-sm btn-info" title="edit" data-original-title="showPhoto" onclick="showPhoto('<?= $value['perijinan_id'] ?>')"><i class="fa fa-images"></i></button>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $('#dataperijinan').DataTable();
  });

  // function pindah(perijinan_id) {
  //   console.log(perijinan_id)
  //   $.ajax({
  //     type: "get",
  //     url: "<?= site_url('c_perizinan/formpindah') ?>",
  //     data: {
  //       perijinan_id: perijinan_id,

  //     },
  //     dataType: "json",
  //     success: function(response) {
  //       if (response.sukses) {
  //         $('.viewmodal').html(response.sukses).show();
  //         $('#modalpindah').modal('show');
  //       }
  //     },
  //     error(xhr, ajaxOptions, thrownError) {
  //       console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
  //     }
  //   });
  // }

  // function perpanjang(perijinan_id) {
  //   console.log(perijinan_id)
  //   $.ajax({
  //     type: "get",
  //     url: "<?= site_url('c_perizinan/formperpanjang') ?>",
  //     data: {
  //       perijinan_id: perijinan_id
  //     },
  //     dataType: "json",
  //     success: function(response) {
  //       console.log(response)
  //       if (response.sukses) {
  //         $('.viewmodal').html(response.sukses).show();
  //         $('#modalperpanjang').modal('show');
  //       }
  //     },
  //     error: function(xhr, ajaxOptions, thrownError) {
  //       console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
  //     }
  //   });
  // }

  function showPhoto(perijinan_id) {
    console.log(perijinan_id)
    $.ajax({
      type: "get",
      url: "<?= site_url('c_perizinan/showPhoto') ?>",
      data: {
        perijinan_id: perijinan_id
      },
      dataType: "json",
      success: function(response) {
        console.log(response)
        if (response.sukses) {
          $('.viewmodal').html(response.sukses).show();
          $('#modalShowPhoto').modal('show');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
      }
    });
  }

  function detail(perijinan_id) {
    console.log(perijinan_id)
    $.ajax({
      type: "get",
      url: "<?= site_url('c_perizinan/detail') ?>",
      data: {
        perijinan_id: perijinan_id
      },
      dataType: "json",
      success: function(response) {
        console.log(response)
        if (response.sukses) {
          $('.viewmodal').html(response.sukses).show();
          $('#modaldetail').modal('show');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
      }
    });
  }

  function edit(perijinan_id) {
    console.log(perijinan_id)
    $.ajax({
      type: "get",
      url: "<?= site_url('c_perizinan/edit') ?>",
      data: {
        perijinan_id: perijinan_id
      },
      dataType: "json",
      success: function(response) {
        console.log(response)
        if (response.sukses) {
          $('.viewmodal').html(response.sukses).show();
          $('#modaledit').modal('show');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
      }
    });
  }



  function hapus(perijinan_id) {
    console.log(perijinan_id)
    swal({
      title: `Yakin ingin menghapus?`,
      buttons: {
        cancel: true,
        confirm: "Confirm",
      },
    }).then((res) => {
      if (res) {
        $.ajax({
          type: "get",
          url: "<?= site_url('c_perizinan/hapus') ?>",
          data: {
            perijinan_id: perijinan_id
          },
          dataType: "json",
          success: function(response) {
            console.log(response)
            if (response.sukses) {
              swal({
                icon: "success",
                title: response.sukses,
              });
              dataperijinan();
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          }
        });
      }
    });

  }
</script>