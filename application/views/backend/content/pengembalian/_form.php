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
                    <?php
                      $ak = Input_helper::postOrOr('id_akun', $data['id_akun']);
                    ?>
                    <select class="form-control" name='id_akun' required>
                      <option value="">Pilih Anggota</option>
                      <?php 
                      foreach($akun as $a){
                      ?>
                        <option <?=($a['id'] == $ak ? 'selected' : '')?> value="<?= $a['id']?>"><?= $a['nama']?></option>
                      <?php } ?>
                      </select>
                  </div>
                </div>
              </div>
              
            </div>
            <p class="card-description">
            Keterangan
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label">Address 1</label> -->
                  <div class="col-sm-12">
                    <textarea class='form-control' rows='8' name='keterangan' placeholder='masukkan keterangan' name='keterangan'><?= Input_helper::postOrOr('keterangan', $data['keterangan']) ?></textarea>
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
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-sm-9">
                      <?php
                        $bu = Input_helper::postOrOr('id_buku', $data['id_buku']);
                      ?>
                      <select class="form-control" name='id_buku[]' required>
                        <option value="">Pilih Buku</option>
                        <?php 
                        foreach($buku as $b){
                        ?>
                          <option <?=($b['id'] == $bu ? 'selected' : '')?> value="<?= $b['id']?>"><?= $b['judul']?></option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <div class="col-sm-9">
                      <input type="number" min='1' class="form-control" name='jumlah[]' value="<?= Input_helper::postOrOr('jumlah', $data['jumlah']) ?>" placeholder='masukkan jumlah' required />
                    </div>
                  </div>
                </div>
                <div class='col-md-1'>
                  <button type='button' class='btn btn-primary pull-right btn-sm' id='tambah_detail'><i class='fa fa-plus'></i></button>
                </div>
              </div>
            </div>
            <div class='col-md-12 row'>
              <button class='btn btn-primary pull-right' type='submit'><?=$action?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>