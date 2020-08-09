<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?> 
            <?php 
            if($this->uri->segment(2) == "" & ($_SESSION['userlevel'] != 1 && $_SESSION['userlevel'] != 2)){
            ?>
            <a href="<?php echo base_url($this->uri->segment(1)); ?>/add"><button class="btn btn-primary btn-sm pull-right">Pengambilan Baru <span class="fa fa-plus"></span></button></a><br><br />
            <?php } ?>
            </h4>
            <?php Response_Helper::part('alert')?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien[no rm]</th>
                    <th>Tanggal Lahir</th>
                    <th>Ruangan</th>
                    <th><?= ($this->uri->segment(2) == 'terlambat' ? 'Taggal Harus Kembali' : 'Tanggal Ambil') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $d) {
                        $tanggal_sekarang = strtotime(date("Y-m-d H:i:s"));
                        // echo (strtotime($d['tanggal_harus_kembali']))."\n";
                        // echo "".strtotime($d['create_at']);
                    ?>
                <tr>
                    <td><?=$no ?></td>
                    <td><?= $d['nama_pasien'].'['.$d['no_rm'].']' ?></td>
                    <td><?= $d['tanggal_lahir_pasien'] ?></td>
                    <td><?= $d['ruangan'] ?></td>
                    <!-- <td><?=($d['status'] == 0 ? 'belum dikembalikan' : 'sudah dikembalikan')?></td> -->
                    <td><?= ($this->uri->segment(2) == 'terlambat' ? $d['tanggal_harus_kembali'] : $d['created_at']) ?></td>
                    <!-- <td>
                        <?php
                        if($d['status'] == 0 & ($_SESSION['userlevel'] != 2)){
                        ?>
                        <a href='<?=base_url("pengembalian"."/kembalikan/".$d['id'])?>'>
                            <button type="button" class="btn btn-sm btn-sms  btn-outline-primary" >
                            Kembalikan
                            </button> 
                        </a>
                        <?php } ?>
                       
                    </td> -->
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