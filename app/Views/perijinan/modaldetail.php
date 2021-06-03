<div class="modal fade bd-example-modal-xl" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-width: 100%;overflow-x: auto;">
        <div class="scoll-tree">
          <table class="table table-bordered table-md" id="dataperijinan">
            <thead>
              <tr>
                <th>Nama Pemegang Ijin</th>
                <th>Alamat</th>
                <th>Jenis Tanah</th>
                <th>Lokasi Tanah</th>
                <th>Nomor Ijin/Tanggal</th>
                <th>Jangka Waktu</th>
                <th>Peruntukan</th>
                <th>Luas M Persegi</th>
                <th>Nilai Tarif M Persegi(Rp)</th>
                <th>Nilai Retribusi M Persegi(Rp)</th>
                <th>Relasi</th>
                <th>Keterangan</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $nama_pemegang_ijin ?></td>
                <td><?= $alamat ?></td>
                <td><?= $jenis_tanah ?></td>
                <td><?= $lokasi_tanah ?></td>
                <td><?= $nomor_ijin ?> - <?= $tanggal_ijin ?></td>
                <td><?= $jw_disahkan ?> s/d <?= $jw_tenggang ?></td>
                <td><?= $peruntukan ?></td>
                <td><?= $luas ?></td>
                <td><?= $nilai_tarip ?></td>
                <td><?= $nilai_retribusi ?></td>
                <td><?= $realisasi ?></td>
                <td><?= $keterangan ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var totalwidth = 190 * $('.list-group').length;

  $('.scoll-tree').css('width', totalwidth);

  $(document).ready(function() {
    $('.formperizinan').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: $(this).attr("action"),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('.btnsimpan').attr('disable', 'disabled');
          $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.btnsimpan').removeAttr('disable', 'disabled');
          $('.btnsimpan').html('Update');
        },
        success: function(response) {
          // swal("Selamat!", "Data berhasil di simpan!", "success");
          if (response.sukses) {
            iziToast.success({
              title: 'OK',
              position: 'topRight',
              message: response.sukses,
            });
            $('#modaldetail').modal('hide');
            dataperijinan();

          }

        },
        error: function(xhr, ajaxOptions, thrownError) {
          // swal(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
          // location.href(<?= site_url('perizinan') ?>)
          console.log(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
        }
      });
    })
  });
</script>