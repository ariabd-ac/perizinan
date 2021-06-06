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
          <button type="button" class="btn btn-sm btn-danger" title="lihat detail" data-original-title="Lihat detail" onclick="detailMessage(<?php echo $value['id_perijinan']?>,<?php echo $value['id']?>)" data-idperijinan="<?= $value['id_perijinan']?>"><i class="fa fa-search-plus"></i></button>
          <button type="button" class="btn btn-sm btn-warning" title="hapus" data-original-title="hapus" onclick="hapusMsg('<?= $value['id'] ?>')"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $('#dataperijinan').DataTable();
  });


  function detail(perijinan_id) {
    console.log(perijinan_id)
    $.ajax({
      type: "get",
      url: "<?= site_url('c_messages/detail') ?>",
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

 
</script>