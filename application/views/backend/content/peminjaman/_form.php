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
                    <input type="text" name="no_rm" placeholder="no_rm" class="form-control" required>
                  </div>
                </div>
              </div>
              
            </div>
            <p class="card-description">
            keperluan
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label">Address 1</label> -->
                  <div class="col-sm-12">
                    <textarea class='form-control' rows='8' name='keperluan' placeholder='masukkan keperluan' name='keperluan'><?= Input_helper::postOrOr('keperluan', $data['keperluan']) ?></textarea>
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
            <div class='col-md-12 row'>
              <button class='btn btn-primary pull-right' type='submit'><?=$type?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>