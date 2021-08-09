<!doctype html>
<html class="no-js" lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title><?php echo $pageTitle ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png') ?>" type="image/png">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/LineIcons.2.0.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.0.0-beta1.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/styleManoel.css') ?>">
        <script>
            /**
             * FUNCTION
             * Mensagem de confirmação de DELETE de registro selecionado.
             * 
             * @date 07/08/2021
             */
            function setDeletar() {
                if (!confirm('Deseja excluir esse registro?')) {
                    return false;
                }
                return true;
            }
            /**
             * FUNCTION
             * Mensagem de confirmação de FINALIZAÇÃO de registro selecionado.
             * 
             * @date 08/08/2021
             */
            function setFinalizar() {
                if (!confirm('Deseja Finalizar essa Tarefa?')) {
                    return false;
                }
                return true;
            }

        </script>
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
        <!--====== CONTENT ==================================================-->
        <section id="home" class="header_area">
            <div id="header_navbar" class="header_navbar" style="background: #E84E4E">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="index.php">
                                    <img class="logo" src="<?php echo base_url('assets/images/logo-2.png') ?>" alt="Logo">
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
                                            <a class="page-scroll" href="/">Página Inicial</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll active" href="/tarefa">Tarefas</a>
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
        </section>
        <section  class="pricing_area pt-120 pb-40">
            <div class="container">
                <div class="section_title text-center pb-30">
                    <h4 class="title" >Tarefas Registradas</h4>
                </div> 
                <?php if (count($registros) > 0) { ?>
                    <div class="row">
                        <div class="col-6">
                            <?php
                            echo anchor(base_url(), '< Voltar', [
                                'class' => 'btn-voltar mb-3',
                                'style' => 'width: 140px'])
                            ?>
                        </div>
                        <div class="col-6 text-right">
                            <?php
                            echo anchor(base_url($className . '/create'), '+Adicionar', [
                                'class' => 'btn-primary mb-3',
                                'style' => 'width: 140px'])
                            ?>
                        </div>
                    </div>
                    <div class="table-responsive-md">
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>ID</th>
                                <th>Responsável</th>
                                <th>Descrição tarefa</th>
                                <th>Categoria</th>
                                <th>Situação</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            <?php foreach ($registros as $registro): ?>
                                <tr>
                                    <td width="80">#<?php echo $registro['id'] ?></td>
                                    <td width="150"><?php echo $registro['responsavel'] ?></td>
                                    <td><?php echo $registro['descricao'] ?></td>
                                    <td width="150"><?php echo $registro['categoria'] ?></td>
                                    <td width="120">
                                        <?php echo $registro['situacao_registro'] == 1 ? '<p class="mb-0 text-danger">Pendente</p>' : '<p class="mb-0 text-success">Finalizada</p>' ?>
                                    </td>
                                    <td class="text-center" width="250">
                                        <?php echo $registro['situacao_registro'] == 2 ? '<span class="mb-0 text-muted">Finalizar</span>' : anchor(base_url($className . '/finish/' . $registro['id']), '<span class="mb-0 text-main">Finalizar</span>', ['onclick' => 'return setFinalizar()']) ?>
                                        -
                                        <?php echo $registro['situacao_registro'] == 2 ? anchor(base_url($className . '/view/' . $registro['id']), '<span class="mb-0 text-main">Visualizar</span>') : anchor(base_url($className . '/edit/' . $registro['id']), '<span class="mb-0 text-main">Editar</span>') ?>
                                        -
                                        <?php echo anchor(base_url($className . '/delete/' . $registro['id']), 'Excluir', ['class' => 'text-secondary', 'onclick' => 'return setDeletar()']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <div class="alert alert-primary">
                                <p class="mb-0"><b>Ops!!!</b> Nenhum registro encontrado!</p>
                                <?php echo anchor(base_url($className . '/create'), 'Novo Registro') ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
        <script src="<?php echo base_url('assets/js/bootstrap.bundle-5.0.0-beta1.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/wow.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
        <script>
            new WOW().init();
        </script>
    </body>
</html>