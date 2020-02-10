<style type="text/css">
  tr{
    height: 20px;
  }
</style>

<div class="py-1">
  <div class="container">
  </div>
</div>
<div class="py-4">
  <div class="container">
  </div>

  <div class="container">
    <div class="row">
       <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped table-borderless" id="newstable">
            <thead>
              <tr>
                <th class="text-center" style="width: 25px">No</th>
                <th class="text-center">NRP</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Status 
                  <button onclick="hadir()" class="btn btn-sm btn-primary pull-right">Hadir Semua</button>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($datamhs as $mhs){ ?>
                <tr>
                  <td class="text-center"><?php echo $i ?></td>
                  <td class="text-center"><?php echo $mhs->NRP_MHS; ?></td>
                  <td class="text-left"><?php echo $mhs->NAMA_MHS ?></td>
                  <td class="text-center pull-right" style="margin-right: 25px">
                    <!-- Default inline 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
                      <label class="custom-control-label" for="defaultInline1">1</label>
                    </div>

                    <!-- Default inline 2-->
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                      <label class="custom-control-label" for="defaultInline2">2</label>
                    </div>

                    <!-- Default inline 3-->
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="defaultInline3" name="inlineDefaultRadiosExample">
                      <label class="custom-control-label" for="defaultInline3">3</label>
                    </div>
                  </td>
                </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

<div class="container">
    <div class="row">
      <a class="btn btn-danger" style="margin: 0 auto; margin-bottom: 10px"href="<?php base_url('Generate/confirm/'.$uniqcode) ?>"> REKAP </a>
    </div>
</div>

<script type="text/javascript">
  function btnunik(){
    var x = document.getElementById("unik");
    if(x.style.display === "none"){
      x.style.display = "block";
    }else{
      x.style.display = "none";
    }
  }

  
</script>