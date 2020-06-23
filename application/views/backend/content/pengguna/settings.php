<div class="content-wrapper">
  <div class="row">
    <div class="col-6 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$title ?></h4>
          <form class="form-sample" method="POST" action='<?=base_url("akun/update/".$_SESSION['id'])?>'>
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
                  <label class="col-sm-3 col-form-label">Nik</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name='nik' value="<?= Input_helper::postOrOr('nik', $data['nik']) ?>" placeholder='masukkan nik' required/>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name='nama' value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder='masukkan nama' required />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name='email' value="<?= Input_helper::postOrOr('email', $data['email']) ?>" placeholder='masukkan email' required/>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No Hp</label>
                  <div class="col-sm-9">
                    <input class="form-control" type='text' name='no_hp' value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder='masukkan no hp' required/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password </label>
                  <div class="col-sm-9">
                    <input class="form-control" type='password' name='password' placeholder='masukkan password'/>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password Konfirmasi</label>
                  <div class="col-sm-9">
                    <input class="form-control" type='password' name='password_konfirmasi' placeholder='masukkan password konfirmasi'/>
                  </div>
                </div>
              </div>
              
            </div>
            <div class='row' style='display:none'>
              <div class='col-md-12'>
                <div class='form-group row'>
                  <label for="" class='col-sm-3 col-form-label'>Level</label>
                  <div class='col-sm-9'>
                    <select class="form-control" name='level' required>
                      <option value="">Pilih Level</option>
                      <?php 
                      $lev = Input_helper::postOrOr('level', $data['level']);
                      ?>
                      <option value="1" <?=($lev == '1' ? 'selected' : '')?>>Super Admin</option>
                      <option value="2" <?=($lev == '2' ? 'selected' : '')?>>Admin</option>
                      <option value="3" <?=($lev == '3' ? 'selected' : '')?>>User</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <p class="card-description">
              Address
            </p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label">Address 1</label> -->
                  <div class="col-sm-12">
                    <textarea class='form-control' rows='8' name='alamat' placeholder='masukkan alamat' name='alamat'><?= Input_helper::postOrOr('alamat', $data['alamat']) ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class='col-md-12'>
              <button class='btn btn-primary pull-right' type='submit'><?=$action?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Berkas - Download Kartu</h4>
            <a href='<?=base_url('akun/kartuPeserta/'.$data['nik'])?>' target="_blank">
                <button type="button" class="btn btn-outline-success btn-fw">
                <i class="mdi mdi-download"></i>Download</button>
            </a>
            </div>
        </div>
    </div>
  </div>
</div>