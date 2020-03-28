<header <?= ($url != '' ? "class='minimal' id='home'" : "id='home' class='agency bg-gradient'  data-parallax='scroll' data-speed='0.5' data-image-src='images/agency/hero.jpg'")?> >
    <!-- navbar -->
    <nav class="navbar navbar-toggleable-md <?= ($url == '' ? 'navbar-border fixed-top navbar-inverse navbar-transparent' : 'navbar-light my-4')?>">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url()?>">
                <img src="<?=base_url('assets')?>/upload/global/<?=$app['logo_white']?>" class="logo-white" alt="Start.ly Logo" <?= ($url == '' ? '' : "style='display:none'")?> />
                <img src="<?=base_url('assets')?>/upload/global/<?=$app['logo_dark']?>" class="logo-dark" alt="Start.ly Logo" <?= ($url != '' ? "style='display:block'" : '' )?>/>
            </a>
            <div class="collapse navbar-collapse" id="site-nav">
                <ul class="navbar-nav text-sm-left ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ($url == '' ? '#home': base_url("#home")) ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ($url == '' ? '#about': base_url("#about")) ?>">About</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li> -->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ($url == '' ? '#view': base_url("#view")) ?>">Best View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ($url == '' ? '#recent': base_url("#recent")) ?>">Recent Book</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['level'])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('apps/login')?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('apps/register')?>">Register</a>
                    </li>
                    <?php }else{?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><?=$_SESSION['email']?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?=base_url('apps/logout')?>">Keluar</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- // end .container -->
    </nav>
    <!-- // end navbar -->
    <!-- hero -->
    <section class="jumbotron text-center d-flex align-items-center "  <?= ($url == '' ? '' : "style='display:none!important'")?>>
        <div class="container">
            <h1 class="display-3 reveal fadeInDown"><?=$app['nama']?></h1>
            <p class="lead my-4 reveal fadeIn" data-wow-delay="0.5s"><?=$app['deskripsi_banner']?></p>
            <p>
                <!-- <a href="#portfolio" class="btn btn-lg btn-primary reveal fadeInUp" data-wow-delay="1s">View our Work</a>
                <a href="#contact" class="btn btn-lg btn-outline reveal fadeInUp" data-wow-delay="1.5s">contact us</a> -->
            </p>
        </div>
        <a class="scroll-down d-flex align-items-center justify-content-center" href="#about">
            <!--  <i class="fa fa-angle-down fa-3x" aria-hidden="true"></i> -->
            <img src="<?=base_url('assets')?>/images/agency/angle-down.svg" width="60" alt="down" />
        </a>
        <!-- // end .scroll-down -->
    </section>
    <!-- // end hero -->
</header>