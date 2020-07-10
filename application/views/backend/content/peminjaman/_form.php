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
                  <label class="col-sm-3 col-form-label">No Rm</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_rm" placeholder="no_rm" class="form-control" value="<?= Input_helper::postOrOr('no_rm', $data['no_rm']) ?>" required>
                    <div class="msg"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Pasien</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_pasien" placeholder="nama_pasien" class="form-control" value="<?= Input_helper::postOrOr('nama_pasien', $data['nama_pasien']) ?>" required>
                    <div class="msg"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" name="tanggal_lahir_pasien" placeholder="tanggal_lahir_pasien" class="form-control" value="<?= Input_helper::postOrOr('tanggal_lahir_pasien', $data['tanggal_lahir_pasien']) ?>" required>
                    <div class="msg"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ruangan</label>
                  <div class="col-sm-9">
                    <input type="number" name="ruangan" placeholder="ruangan" class="form-control" value="<?= Input_helper::postOrOr('ruangan', $data['ruangan']) ?>" required>
                    <div class="msg"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p class="card-description">keperluan</p>
                  <textarea class='form-control' rows='8' name='keperluan' placeholder='masukkan keperluan' name='keperluan' required><?= Input_helper::postOrOr('keperluan', $data['keperluan']) ?></textarea>
              </div>
              <div class="col-md-6">
                <p class="card-description">keterangan</p>
                  <textarea class='form-control' rows='8' name='keterangan' placeholder='masukkan keperluan' name='keperluan' required><?= Input_helper::postOrOr('keperluan', $data['keperluan']) ?></textarea>
              </div>
            </div>
            <div class='col-md-12 row'>
              <button class='btn btn-primary pull-right' type='submit'><?=$type?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>