<table class="table table-bordered table-md">
  <thead>
    <tr>
      <th>#</th>
      <th>Keterangan</th>
      <th>Tanggal</th>
      <!-- <th>Aksi</th> -->
      <th>Aksi detail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($messages as $key => $value) : ?>
      <tr class="<?php echo ($value['status_message'] == '1') ? 'table-active':'' ?>">
        <td><?= $key + 1 ?></td>
        <td><?= $value['text_message'] ?></td>
        <td><?= $value['created_at'] ?></td>
       
        <td>
          <button type="button" class="btn btn-sm btn-danger" title="lihat detail" data-original-title="Lihat detail" onclick="detail('<?= $value['perijinan_id'] ?>')"><i class="fa fa-search-plus"></i></button>
          <button type="button" class="btn btn-sm btn-warning" title="hapus" data-original-title="hapus" onclick="hapus('<?= $value['perijinan_id'] ?>')"><i class="fa fa-trash"></i></button>
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