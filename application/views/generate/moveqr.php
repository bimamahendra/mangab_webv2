<div class="py-1">
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-12"><h3 class="display-3">Mahasiswa</h3></div> -->
    </div>
  </div>
</div>
<div class="py-0">
  <?php if ($this->session->flashdata('success_message')){ ?>
  <div class="container">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Sukses!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>
      <p><?= $this->session->flashdata('success_message') ?></p>
    </div>
  </div>
  <?php }
  if ($this->session->flashdata('error_message')){ ?>
  <div class="container">
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Oh snap!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>
      <p><?= $this->session->flashdata('error_message') ?></p>
    </div>
  </div>
  <?php } ?>
</div>
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped table-borderless" id="newstable">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Mata Kuliah</th>
                <th class="text-center">Nama Mata Kuliah  </th>
                <th class="text-center">Kelas</th>
                <th class="text-center" style="width: 100px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($matkul_list as $row) {?>
                <tr>
                  <td class="text-center"><?php echo $i ?></td>
                  <td class="text-center"><?php echo $row->KODE_MATKUL ?></td>
                  <td><?php echo $row->NAMA_MATKUL ?></td>
                  <td class="text-center"><?php echo $row->KELAS_MATKUL ?></td>
                  <td class="text-center"><a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalTopic" data-id="<?php echo $row->ID_MATKUL; ?>"
                        data-title="<?php echo $row->ID_MATKUL; ?>"><span class="fa fa-pencil"></span> Buat Kelas</a></td>
                </tr>
              <?php $i++;} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalTopic" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Pembuatan Kelas</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
      </div>

      <form id="topikForm" method="POST" action="<?php echo site_url('Generate/generate/'.$row->ID_MATKUL) ?>">
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <i class="fa fa-thumb-tack text-secondary"></i>
            <label data-error="wrong" data-success="right" for="defaultForm-room">Topik Kelas</label>
            <input type="text" name="topik" class="form-control validate">
          </div>

          <p id="qrtitle"></p>
        </div>

        <div class="modal-footer"> 
          <a href="<?php echo site_url('Generate/generate/'.$row->ID_MATKUL) ?>" class="btn btn-success">Buat</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$('#ModalTopic').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var qr_id = button.data('id')
    var modal = $(this)
    var qr_title = button.data('title');
    document.getElementById('qrtitle').innerHTML = qr_title;
    modal.find('.modal-footer a').attr("href", "<?= base_url() ?>Generate/generate/" + qr_id)
})
</script>