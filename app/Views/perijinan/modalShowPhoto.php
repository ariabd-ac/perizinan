<div class="modal fade bd-example-modal-xl" id="modalShowPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto Lokasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-width: 100%;overflow-x: auto;">
        <div class="scoll-tree">
          <div class="col-md-12 col-lg-12 col-12 col-sm-12 col-xl-12 col-xs-12" style="display:flex;flex:1;align-items: center;">
            <img style="
                    width: 1000px;      
                    box-shadow: 7px 16px 29px 11px rgba(0, 0, 0, 0.25); 
                    border-radius: 10px;            
                  " src="<?= base_url() . "/uploads/foto_lokasi/" . $foto_lokasi; ?>" alt="foto-lokasi">
          </div>

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
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-CSRF-Token', "<?= csrf_hash() ?>");
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
            $('#modalShowPhoto').modal('hide');

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