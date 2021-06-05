<div class="modal fade" id="modalperpanjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingin Memperpanjang?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="c_perizinan/updatedata2" method="" class="formperizinan">
        <?= csrf_field() ?>
        <div class="modal-body">
          <input type="hidden" name="perijinan_id" id="perijinan_id" class="form-control" value="<?= $perijinan_id ?>" required>
          <div class="form-group">
            <label class="d-block">Tenggang</label>
            <input type="date" name="jw_tenggang" id="jw_tenggang" class="form-control datepicker" value="<?= $jw_tenggang ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btnsimpan">Update </button>
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
            $('#modalperpanjang').modal('hide');
            dataperijinan();

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