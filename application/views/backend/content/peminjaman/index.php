<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?> 
            <?php 
            if($this->uri->segment(2) == ""){
            ?>
            <a href="<?php echo base_url($this->uri->segment(1)); ?>/add"><button class="btn btn-primary btn-sm pull-right">Peminjaman Baru <span class="fa fa-plus"></span></button></a><br><br />
            <?php } ?>
            </h4>
            <?php Response_Helper::part('alert')?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <?php 
                    if (in_array($_SESSION['userid'] , [1, 2])) {?>
                        <th>Nama Peminjam</th>
                    <?php } ?>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    <th>Tanggal Harus Kembali</th><th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $d) {
                        $tanggal_sekarang = strtotime(date("Y-m-d H:i:s"));
                        $tanggal_kembali = strtotime($d['tanggal_harus_kembali']);
                        // echo (strtotime($d['tanggal_harus_kembali']))."\n";
                        // echo "".strtotime($d['create_at']);
                    ?>
                <tr class='<?=(($tanggal_sekarang > $tanggal_kembali && $d['status'] == 0) ? "table-danger" : "")?>'>
                    <td><?=$no ?></td>
                    <?php 
                    if (in_array($_SESSION['userid'] , [1, 2])) {?>
                    <td><?= $d['nama'] ?></td>
                    <?php } ?>
                    <td><?= $d['created_at'] ?></td>
                    <td><?=($d['status'] == 0 ? 'belum dikembalikan' : 'sudah dikembalikan')?></td>
                    <td><?= $d['tanggal_harus_kembali'] ?></td>
                    <td>
                         <a target="_blank" href='<?=base_url($this->uri->segment(1)."/detail/".$d['id'])?>'>
                            <button type="button" class="btn btn-sm btn-sms btn-icons btn-rounded btn-outline-warning">
                            <i class="mdi mdi-book"></i>
                            </button> 
                        </a>
                        <?php
                        if($d['status'] == 0){
                        ?>
                        <a href='<?=base_url("pengembalian"."/kembalikan/".$d['id'])?>'>
                            <button type="button" class="btn btn-sm btn-sms  btn-outline-primary" >
                            Kembalikan
                            </button> 
                        </a>
                        <?php } ?>
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