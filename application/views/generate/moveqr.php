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
                  <td><?php echo $row->ID_MATKUL ?></td>
                  <td class="text-center">
                    <a  href="#" data-toggle="modal" data-target="#ModalTopic" req_id="<?php echo $row->ID_MATKUL; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Buat Kelas</a>
                  </td>
                </tr>
              <?php $i++;} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalTopic" role="dialog" tab-index="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Topik Perkuliahan</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
      </div>

      <form class="form-horizontal" action="<?php echo base_url('Generate/generate/'.$row->ID_MATKUL) ?>" method="post" enctype="multipart/form-data" role="form">

      <div class="modal-body">
          <div class="md-form">
            <i class="fa fa-thumb-tack text-secondary"></i>
            <label data-error="wrong" data-success="right" for="defaultForm-room">Topik Kelas</label>
            <input type="text" id="topik" name="topik" class="form-control validate">
            <input type="hidden" id="id" name="id">
          </div>

          <p id="qrtitle"></p>
        </div>
      <div class="modal-footer"> 
        <button type="submit" class="btn btn-success">Buat</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
      </div>

      </form>

    </div>
  </div>
</div>


<script>
$(document).ready(function(){
  $('#ModalTopic').on('show.bs.modal', function (event) {
    var req_id = $(e.relatedTarget).data('id');
    var modal = $(this);

    modal.find('#id').val(req_id);
    
  });
});
</script>