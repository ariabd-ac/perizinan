<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Perijinan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="c_perizinan/updatedata3" method="" class="formperizinan">
        <?= csrf_field() ?>
        <div class="modal-body">
          <input type="hidden" name="perijinan_id" id="perijinan_id" class="form-control" value="<?= $perijinan_id ?>" required>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-6 col-xs-6 col-xl-6 col-xxl-6">
              <div class="form-group">
                <label>Nomor Rekomtek</label>
                <div class="input-group">
                  <input type="text" name="nomor_rekomtek" id="nomor_rekomtek" value="<?= $nomor_rekomtek ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-6 col-xs-6 col-xl-6 col-xxl-6">
              <div class="form-group">
                <label>Tanggal Rekomtek</label>
                <div class="input-group">
                  <input type="date" name="tanggal_rekomtek" id="tanggal_rekomtek" value="<?= $tanggal_rekomtek ?>" class="form-control datepicker">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Nama Pemegang Ijin</label>
            <div class="input-group">
              <input type="text" name="nama_pemegang_ijin" id="nama_pemegang_ijin" class="form-control" value="<?= $nama_pemegang_ijin ?>" required>
            </div>

          </div>
          <div class="form-group">
            <label>Alamat</label>
            <div class="input-group">
              <textarea name="alamat" cols="100" rows="5" id="alamat" class="form-control"><?= $alamat ?></textarea>
            </div>

          </div>
          <div class="form-group">
            <label>Jenis Tanah</label>
            <div class="input-group">
              <input type="text" name="jenis_tanah" id="jenis_tanah" value="<?= $jenis_tanah ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Lokasi Tanah</label>
            <div class="input-group">
              <input type="text" name="lokasi_tanah" id="lokasi_tanah" value="<?= $lokasi_tanah ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Nomor Ijin</label>
            <div class="input-group">
              <input type="text" name="nomor_ijin" id="nomor_ijin" value="<?= $nomor_ijin ?>" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-lg-4 col-4 col-sm-4">
              <div class="form-group">
                <label class="d-block">Tanggal Ijin</label>
                <input type="date" name="tanggal_ijin" id="tanggal_ijin" value="<?= $tanggal_ijin ?>" class="form-control datepicker">
              </div>
            </div>
            <div class="col-md-4 col-lg-4 col-4 col-sm-4">
              <div class="form-group">
                <label class="d-block">Disahkan</label>
                <input type="date" name="jw_disahkan" id="jw_disahkan" value="<?= $jw_disahkan ?>" class="form-control datepicker">
              </div>
            </div>
            <div class="col-md-4 col-lg-4 col-4 col-sm-4">
              <div class="form-group">
                <label class="d-block">Tenggang</label>
                <input type="date" name="jw_tenggang" id="jw_tenggang" value="<?= $jw_tenggang ?>" class="form-control datepicker">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Peruntukan</label>
            <div class="input-group">
              <input type="text" name="peruntukan" id="peruntukan" value="<?= $peruntukan ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Luas</label>
            <div class="input-group">
              <input type="number" name="luas" id="luas" value="<?= $luas ?>" class="form-control">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  m2
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Nilai Tarip</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  Rp
                </div>
              </div>
              <input type="number" name="nilai_tarip" id="nilai_tarip" class="form-control" value="<?= $nilai_tarip ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Nilai Retribusi</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  Rp
                </div>
              </div>
              <input type="number" name="nilai_retribusi" id="nilai_retribusi" value="<?= $nilai_retribusi ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="d-block">Realisasi</label>
            <input type="text" name="realisasi" id="realisasi" value="<?= $realisasi ?>" class="form-control">
          </div>
          <div class="form-group">
            <label class="d-block">Korpokla</label>
            <input type="text" name="korpokla_by" id="korpokla_by" value="<?= $korpokla_by ?>" class="form-control" disabled>
          </div>

          <div class="form-group">
            <label class="d-block">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" value="<?= $keterangan ?>" class="form-control">
          </div>
          <div class="form-group">
            <label class="d-block">User by</label>
            <input type="text" name="user_by" id="user_by" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btnsimpan">Save </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.formperizinan').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: $(this).attr("action"),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-CSRF-Token', "<?= csrf_hash() ?>");
          $('.btnsimpan').attr('disable', 'disabled');
          $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.btnsimpan').removeAttr('disable', 'disabled');
          $('.btnsimpan').html('Simpan');
        },
        success: function(response) {
          console.log(response);
          // swal("Selamat!", "Data berhasil di simpan!", "success");
          if (response.sukses) {
            iziToast.success({
              title: 'OK',
              position: 'topRight',
              message: 'Berhasil disimpan',
            });
            $('#modaledit').modal('hide');
            dataperijinan();
            dataperijinanDefault();
          }
          // validasi


          // console.log(response)
          // alert(response.sukses);
          // if (response.error) {
          //   if (response.error.nama_pemegang_ijin) {
          //     $('#nama_pemegang_ijin').addClass('is-invalid')
          //     $('.errorNama').css('display', 'block');
          //     $('.errorNama').html(response.error.nama_pemegang_ijin)
          //   } else {
          //     $('#nama_pemegang_ijin').removeClass('is-invalid')
          //     $('.errorNama').css('display', 'none');
          //     $('.errorNama').html('')
          //   }
          //   if (response.error.alamat) {
          //     console.log(response);
          //     $('#alamat').addClass('is-invalid')
          //     $('.errorAlamat').css('display', 'block');
          //     $('.errorAlamat').html(response.error.alamat)
          //   } else {
          //     $('#nama_pemegang_ijin').removeClass('is-invalid')
          //     $('.errorAlamat').css('display', 'none');
          //     $('.errorAlamat').html('')
          //   }
          // }


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