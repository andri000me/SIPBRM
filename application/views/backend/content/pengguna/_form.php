<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$title ?></h4>
          <form class="form-sample" method="POST" action=''>
          <?php Response_Helper::part('alert')?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name='nama' value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder='masukkan nama' required />
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name='email' value="<?= Input_helper::postOrOr('email', $data['email']) ?>" placeholder='masukkan email' required/>
                  </div>
                </div>
              </div> -->
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password </label>
                  <div class="col-sm-9">
                    <input class="form-control" type='password' name='password' placeholder='masukkan password'/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password Konfirmasi</label>
                  <div class="col-sm-9">
                    <input class="form-control" type='password' name='password_konfirmasi' placeholder='masukkan password konfirmasi'/>
                  </div>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group row'>
                  <label for="" class='col-sm-3 col-form-label'>Level</label>
                  <div class='col-sm-9'>
                    <select class="form-control" name='level' required>
                      <option value="">Pilih Level</option>
                      <?php
                  $level = Input_Helper::postOrOr('level', $data['level']);
                  for ($i=2; $i < count(LEVEL); $i++) {
                  ?>
                    <option <?= ($level == $i ? "selected" : "")?> value="<?= $i ?>"><?= LEVEL[$i] ?></option>
                    <!-- <option selected="selected"><?= LEVEL[$i] ?></option> -->
                  <?php } ?>
                  </select>
                    </select>
                  </div>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group row'>
                  <label for="" class='col-sm-3 col-form-label'>Status</label>
                  <div class='col-sm-9'>
                    <select class="form-control" name='status' required>
                      <option value="">Pilih Status</option>
                      <?php
                  $status = Input_Helper::postOrOr('status', $data['status']);
                  for ($a=0; $a < count(STATUS_PENGGUNA); $a++) {
                  ?>
                    <option <?= ($status == $a ? "selected" : "")?> value="<?= $a ?>"><?= STATUS_PENGGUNA[$a] ?></option>
                  <?php } ?>
                  </select>
                    </select>
                  </div>
                </div>
              </div>
            </div>
           
            <div class='col-md-12'>
              <button class='btn btn-primary pull-right' type='submit'><?=$type?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</div>