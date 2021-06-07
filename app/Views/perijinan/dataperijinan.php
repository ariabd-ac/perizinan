<table class="table table-bordered table-md" id="dataperijinan">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Pemegang Ijin</th>
      <th>Alamat</th>
      <th>Jenis Tanah</th>
      <th>Lokasi Yang Dimohon</th>
      <th>Nomor Ijin/Tanggal</th>
      <th>Jangka Waktu</th>
      <th>Created By</th>
      <!-- <th>Peruntukan</th>
                <th>Luas M Persegi</th>
                <th>Nilai Tarif M Persegi(Rp)</th>
                <th>Nilai Retribusi M Persegi(Rp)</th> -->
      <!-- <th>Relasi</th>
                <th>Keterangan</th> -->
      <!-- <th>Aksi</th> -->
      <th>Aksi detail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($perijinan as $key => $value) : ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $value['nama_pemegang_ijin'] ?></td>
        <td><?= $value['alamat'] ?></td>
        <td><?= $value['lokasi_tanah'] ?></td>
        <td><?= $value['jenis_tanah'] ?></td>
        <td><?= $value['nomor_ijin'] ?> - <?= $value['tanggal_ijin'] ?></td>
        <td><?= $value['jw_disahkan'] ?> s/d <?= $value['jw_tenggang'] ?></td>
        <td><?= $value['username'] ?></td>
        <!-- <td>Cocok tanam palawija</td>
                  <td>144,00</td>
                  <td>250</td>
                  <td>360.000</td> -->
        <!-- <td>LUNAS</td> -->

        <!-- <td>
          <div class="row">
            <button type="button" style="margin-right: 10px;" class="btn btn-sm btn-info" title="pindah tangan" data-original-title="pindah tangan" onclick="pindah('<?= $value['perijinan_id'] ?>')"><i class="fa fa-handshake"></i></button>
            <button type="button" class="btn btn-sm btn-danger" title="perpanjang" data-original-title="perpanjang" onclick="perpanjang('<?= $value['perijinan_id'] ?>')"><i class="fa fa-stopwatch"></i></button>
          </div>
        </td> -->
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