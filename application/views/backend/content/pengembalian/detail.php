<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$title ?></h4>
          <form class="form-sample" method="POST" action='' enctype="multipart/form-data">
            <?php
              if(isset($_SESSION['message'])){
              echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                  ".$_SESSION['message'][1]."
              </div>";
              }
            ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Anggota</label>
                  <div class="col-sm-9">
                    <?=$data[0]['nama']?>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- <p class="card-description">
            Keterangan
            </p> -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Keterangan</label>
                  <div class="col-sm-9">
                    <?=$data[0]['keterangan']?>
                  </div>
                </div>
              </div>
            </div>
            
            <div id='row_detail'>
              <div class="row" id='detail_peminjaman'>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Buku</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jumlah</label>
                  </div>
                </div>
                <?php 
                foreach($data as $d){
                ?>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-sm-9">
                      
                      <?=$d['judul']?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <div class="col-sm-9">
                    <?=$d['jumlah']?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group row">
                    <div class="col-sm-9 form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name='ketersediaan[]' required> Ada
                      <i class="input-helper"></i></label>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="col-md-12">
                  <div class="form-group row">
                    <button class='btn btn-primary' type='submit'>Kembalikan</button>
                  </div>
                </div>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>