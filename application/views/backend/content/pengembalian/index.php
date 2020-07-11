<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?> <br><br /></h4>
            <?php
                if(isset($_SESSION['message'])){
                echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                    ".$_SESSION['message'][1]."
                </div>";
                }
            ?>
            <?php 
            if($_SESSION['userlevel'] == 4){
            ?>
            <a href="<?php echo base_url($this->uri->segment(1)); ?>/add"><button class="btn btn-primary btn-sm pull-right">Pengembalian Baru <span class="fa fa-plus"></span></button></a><br><br />
            <?php } ?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien[no rm]</th>
                    <th>Tanggal Lahir</th>
                    <th>Ruangan</th>
                    <th>Tanggal Harus kembali</th>
                    <th>Tanggal Pengembalian</th>
                    <?php if($_SESSION['userlevel'] == 5){?>
                    <th>Status</th>
                    <th>Aksi</th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                <tr>
                    <td><?=$no ?></td>
                    <td><?= $d['nama_pasien']."[".$d['no_rm']."]" ?></td>
                    <td><?= $d['tanggal_lahir_pasien'] ?></td>
                    <td><?= $d['ruangan'] ?></td>
                    <td><?= $d['tanggal_harus_kembali'] ?></td>
                    <td><?= $d['created_at'] ?></td>
                    <?php if($_SESSION['userlevel'] == 5){?>
                    <td><?= STATUS_TERIMA[$d['status']]?></td>
                    <td>
                        <?php
                        if($d['status'] == 0){
                            ?>
                            
                        <a  href='<?=base_url($this->uri->segment(1)."/status/".$d['id'])?>'>
                            <button type="button" class="btn btn-sm btn-sms btn-icons btn-rounded btn-outline-success">
                            <i class="mdi mdi-check"></i>
                            </button> 
                        </a>
                        <?php } ?>
                    </td>
                    <?php } ?>
                </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>