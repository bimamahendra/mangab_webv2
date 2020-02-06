<div class="py-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center" style="margin-top: 15px"><h5>Scan QR Code dibawah ini untuk dapat mengikuti perkuliahan</h5></div>
      <button onclick="btnunik()" class="text-center btn-sm btn-success" style="margin: 0 auto; margin-bottom: 10px">Kode Unik</button>
    </div>
    <div class="row" style="display: none" id="unik">
        <h3 class="text-center" style="margin: 0 auto"><?php echo $uniqcode ?></h3>
    </div>
  </div>
</div>
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="text-center" style="margin: 0 auto; margin-top: -30px">
        <img src="<?php echo base_url('assets/images/qr/'.$uniqcode.'.png') ?>" height="400" width="400" class="img-fluid" alt="">
      </div>
    </div>
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