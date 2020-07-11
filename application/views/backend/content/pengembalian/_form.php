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
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No RM</label>
                  <div class="col-sm-9">
                   <select name="no_rm" id="get_no_rm" class="form-control" required>
                    <option value="">Pilih No Rm</option>
                    <?php 
                    foreach ($pengambilan as $n) {?>
                    <option value="<?= $n['no_rm'] ?>"><?= $n['no_rm'] ?></option>
                    <?php } ?>
                   </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Lahir </label>
                  <div class="col-sm-9" id="tanggal_lahir">
                   <?= $data['tanggal_lahir_pasien'] ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Pasien</label>
                  <div class="col-sm-9" id="nama_pasien">
                   <?= $data['nama_pasien'] ?>
                  </div>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ruangan</label>
                  <div class="col-sm-9" id="ruangan">
                   <?= $data['ruangan'] ?>
                  </div>
                </div>
              </div>
              <input type="hidden" name="id_pengambilan" id="id_pengambilan">
            </div>
            <p class="card-description">
            Bayar
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label">Address 1</label> -->
                  <div class="col-sm-12">
                    <select name="bayar" class="form-control" id="">
                    <?php 
                    for($i=1;$i<count(BAYAR);$i++){
                    ?>
                    <option value="<?= $i?>"><?= BAYAR[$i] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <p class="card-description">
            Tanggal Pulang
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label">Address 1</label> -->
                  <div class="col-sm-12">
                    <input type="date" class="form-control" name="tanggal_pulang" required>
                  </div>
                </div>
              </div>
            </div>
            <p class="card-description">
            Tanggal Kembali
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label">Address 1</label> -->
                  <div class="col-sm-12">
                    <input type="date" class="form-control" name="tanggal_kembali" required>
                  </div>
                </div>
              </div>
            </div>
            
            <div class='col-md-12 row'>
              <button class='btn btn-primary pull-right delete' type='submit'><?=$type?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>