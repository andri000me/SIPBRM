<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?> <a href="<?php echo base_url($this->uri->segment(1)); ?>/add"><button class="btn btn-primary btn-sm pull-right">Peminjaman Baru <span class="fa fa-plus"></span></button></a><br><br /></h4>
            <?php
                if(isset($_SESSION['message'])){
                echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                    ".$_SESSION['message'][1]."
                </div>";
                }
            ?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th><th>Nama Peminjam</th><th>Keterangan</th><th>Status</th><th>Tanggal Pinjam</th><th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                <tr>
                    <td><?=$no ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['keterangan'] ?></td>
                    <td><?=($d['status'] == 0 ? 'belum dikembalikan' : 'sudah dikembalikan')?></td>
                    <td><?= $d['create_at'] ?></td>
                    <td>
                         <a href='<?=base_url($this->uri->segment(1)."/detail/".$d['kd_peminjaman'])?>'>
                            <button type="button" class="btn btn-sm btn-sms btn-icons btn-rounded btn-outline-warning">
                            <i class="mdi mdi-book"></i>
                            </button> 
                        </a>
                        <!--
                        <a href='<?=base_url($this->uri->segment(1)."/delete/".$d['id'])?>' class='delete'>
                            <button type="button" class="btn btn-sms btn-icons btn-rounded btn-outline-danger">
                            <i class="fa fa-trash-o"></i>
                            </button>
                        </a> -->
                    </td>
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