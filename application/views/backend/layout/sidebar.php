<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="user-wrapper">
            <div class="profile-image">
                <img src="<?=base_url('assets/')?>images/faces/face1.jpg" alt="profile image">
            </div>
            <div class="text-wrapper">
                <p class="profile-name"><?= $_SESSION['nama'] ?></p>
                <div>
                <small class="designation text-muted"><?=LEVEL[$_SESSION['userlevel']]?></small>
                <span class="status-indicator online"></span>
                
                </div>
            </div>
            </div>
        </div>
        </li>
        <?php if ($_SESSION['userlevel'] == 1 || $_SESSION['userlevel'] == 2) {?>
        <li class="nav-item  <?= ($this->uri->segment(1) == "pengguna" && $this->uri->segment(2) == "add" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pengguna/add')?>">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Data Pengguna</span>
            </a>
        </li>
        <?php } 
        ?>
        <?php 
        
        if (in_array($_SESSION['userlevel'], [1, 3, 4, 5, 2])) {
            if (in_array($_SESSION['userlevel'], [1, 2])) {
        ?>
        <!-- <li class="nav-item <?= ($this->uri->segment(1) == "laporan" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('laporan')?>">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Laporan</span>
            </a>
        </li> -->
        <?php }
        if (in_array($_SESSION['userlevel'], [1, 2, 3])) { ?>
        <li class="nav-item <?= ($this->uri->segment(1) == "pengambilan" && $this->uri->segment(2) == "add" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pengambilan/add')?>">
                <i class="menu-icon mdi mdi-format-list-checks"></i>
                <span class="menu-title">Data Pengambilan</span>
            </a>
        </li>
        
        <?php } 
        if (in_array($_SESSION['userlevel'], [4, 1, 2, 3, 5])) {
            if(in_array($_SESSION['userlevel'], [1,2, 4, 5])){
        ?>
        <li class="nav-item <?= ($this->uri->segment(1) == "pengembalian" && $this->uri->segment(2) == "add" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pengembalian/add')?>">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Data Pengembalian</span>
            </a>
        </li>
        <?php }} ?>
        <li class="nav-item <?= (in_array($this->uri->segment(1), ['pengguna',  'pengambilan', 'pengembalian', 'terlambat']) && $this->uri->segment(2) == ''? 'active' : '') ?>">
            <a class="nav-link <?= (in_array($this->uri->segment(1), ['pengguna',  'pengambilan', 'pengembalian', 'terlambat']) && $this->uri->segment(2) == ''? 'collapsed' : '') ?>" data-toggle="collapse" href="#laporan" aria-expanded="<?= (in_array($this->uri->segment(1), ['pengguna',  'pengambilan', 'pengembalian']) && $this->uri->segment(2) == ''? 'true' : 'false') ?>" aria-controls="laporan">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= (in_array($this->uri->segment(1), ['pengguna',  'pengambilan', 'pengembalian', 'terlambat']) && $this->uri->segment(2) == ''? 'show' : '') ?>" id="laporan">
                <ul class="nav flex-column sub-menu">
                <?php if (in_array($_SESSION['userlevel'], [4, 1, 2, 3, 5])) { 
                    if (in_array($_SESSION['userlevel'], [1, 2, 3])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($this->uri->segment(1) == "pengambilan" ? 'active' : '') ?>" href="<?=base_url('pengambilan')?>">Pengambilan</a>
                    </li>
                    <?php }
                    if(in_array($_SESSION['userlevel'], [1,2, 4, 5])){
                        if($_SESSION['userlevel'] == 5 || $_SESSION['userlevel'] == 2){?>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'terlambat' ? 'active' : '') ?>" href="<?=base_url('terlambat')?>">Ketidaktepatan Waktu <br>Pengembalian</a>
                    </li>
                        <?php }
                        
                        if ($_SESSION['userlevel'] == 1 || $_SESSION['userlevel'] == 2) {?>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($this->uri->segment(1) == "pengguna" ? 'active' : '') ?>" href="<?=base_url('pengguna')?>">Pengguna</a>
                    </li>
                        <?php } ?>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($this->uri->segment(1) == "pengembalian" ? 'active' : '') ?>" href="<?=base_url('pengembalian')?>">Pengembalian</a>
                    </li>
                    <?php } } ?>
                </ul>
            </div>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('apps/logout')?>">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Keluar</span>
            </a>
        </li>
    </ul>
</nav>