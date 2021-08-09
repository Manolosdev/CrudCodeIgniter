<!doctype html>
<html class="no-js" lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title><?php echo $pageTitle ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png') ?>" type="image/png">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/LineIcons.2.0.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.0.0-beta1.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/styleManoel.css')?>">
    </head>
    <body>
        <!--====== PRELOADER ================================================-->
        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== HOME =====================================================-->
        <section id="home" class="header_area">
            <div id="header_navbar" class="header_navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="index.php">
                                    <img class="logo" src="<?php echo base_url('assets/images/logo-2.png')?>" alt="Logo">
                                    Code<strong>Igniter</strong>
                                </a>
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="page-scroll active" href="/">Página Inicial</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="/tarefa">Tarefas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="/responsavel">Responsáveis</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="/categoria">Categorias</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_hero">
                <div class="single_hero bg_cover d-flex align-items-center" style="background-image: url(<?php echo base_url('assets/images/hero.jpg')?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mb-4 text-center">
                                <h2 class="hero_title text-white wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s" style="visibility: visible;animation-duration: 1.3s;animation-delay: 0.2s;animation-name: fadeInUp;">Estudo CodeIgniter</h2>
                            </div>
                            <div class="col-12 mb-3 text-center">
                                <?php
                                echo anchor(base_url('responsavel/index'), '<i class="lni lni-user"></i>  Responsáveis', [
                                    'class' => 'main-btn wow fadeInUp',
                                    'style' => 'width: 250px',
                                    'data-wow-duration' => '1.3s',
                                    'data-wow-delay' => '.3s'
                                ])
                                ?>
                            </div>
                            <div class="col-12 mb-3 text-center">
                                <?php
                                echo anchor(base_url('categoria/index'), '<i class="lni lni-layers"></i>  Categorias', [
                                    'class' => 'main-btn wow fadeInUp',
                                    'style' => 'width: 250px',
                                    'data-wow-duration' => '1.3s',
                                    'data-wow-delay' => '.6s'
                                ])
                                ?>
                            </div>
                            <br>
                            <div class="col-12 mb-3 text-center">
                                <?php
                                echo anchor(base_url('categoria/index'), '<i class="lni lni-clipboard"></i>  Tarefas', [
                                    'class' => 'main-btn wow fadeInUp',
                                    'style' => 'width: 250px',
                                    'data-wow-duration' => '1.3s',
                                    'data-wow-delay' => '.9s'
                                ])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== FOOTER ===================================================-->
        <footer id="footer" class="footer_area">
            <div class="container">
                <div class="footer_wrapper text-center d-md-flex align-items-center justify-content-between">
                    <p class="credit">© 2021 Manoel Louro</p>
                    <div class="footer_social">
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/manoel.louro"><i class="lni lni-facebook-original"></i></a></li>
                            <li><a target="_blank" href="https://github.com/Manolosdev"><i class="lni lni-github-original"></i></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/in/manoel-louro-9ab1581b6/"><i class="lni lni-linkedin-original"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== BTN VOLTAR TOP ===========================================-->
        <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
        <!--====== SCRIPTS JS ===============================================-->
        <script src="<?php echo base_url('assets/js/bootstrap.bundle-5.0.0-beta1.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/wow.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/main.js')?>"></script>
        <script>
            new WOW().init();
        </script>
    </body>
</html>