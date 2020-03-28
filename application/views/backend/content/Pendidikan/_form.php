<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$title ?></h4>
          <form class="form-sample" method="POST" action=''>
          <?php Response_Helper::part('alert')?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-form-label">Nama</label>
                    <input type="text" class="form-control" name='nama' value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder='masukkan nama' required />
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