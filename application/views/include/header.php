<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="<?php echo base_url('assets/bs/css/bootstrap.css') ?>">
    <link rel="icon" type="imagem/png" href="<?php echo base_url('assets/img/logoML.png'); ?>" />


    <title>
        <?php
        echo $title_do_header;
        ?>
    </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg flex-row" style="background-color: #91D8F7; padding:0px;">
            <a class="navbar-brand" style="padding: 0px;" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('assets/img/logoML2.png'); ?>" width="80" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item navegacao_header"><a class="navegacao_a" href="<?php echo base_url(); ?>">Início</a></li>
                    <li class="nav-item navegacao_header"><a class="navegacao_a" href="<?php echo base_url('catalogo'); ?>">Catálogo</a></li>
                    <li class="nav-item navegacao_header"><a class="navegacao_a" href="<?php echo base_url('sobre'); ?>">Sobre</a></li>
                    <li class="nav-item navegacao_header"><a class="navegacao_a" href="<?php echo base_url('informacoes'); ?>">Informações</a></li>

                    <?php
                    if (isset($this->session->userdata['id_user'])) { ?>

                        <li class="nav-item dropdown navegacao_header">
                            <!-- menu dropdown-->
                            <a class="nav-link dropdown-toggle navegacao_a" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->session->userdata['nm_user'] ?>
                                <!--nome do usuário-->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <?php switch ($this->session->userdata['permissao']) {
                                        case 1: //adm
                                        case 2: //biblio
                                            ?>
                                        <a class="dropdown-item" href="<?php echo base_url('cad_livro'); ?>">Cadastrar livro</a>
                                        
                                        <a class="dropdown-item" href="<?php echo base_url('cad_users'); ?>">Cadastrar usuário</a>
                                        <a class="dropdown-item" href="<?php echo base_url('pes_users'); ?>">Pesquisar / editar usuário</a>
                                        <a class="dropdown-item" href="<?php echo base_url('locacoes'); ?>">Locações</a>
                                        <a class="dropdown-item" href="<?php echo base_url('cad_conteudos'); ?>">Alterar / Inserir conteúdo</a>
                                        <a class="dropdown-item" href="<?php echo base_url('mensagens'); ?>">Mensagens</a>
                                    <?php
                                            break;

                                        case 3: //locador
                                            ?>
                                        <a class="dropdown-item" href="<?php echo base_url('perfil'); ?>">Pagina do locador</a>
                                        <a class="dropdown-item" href="<?php echo base_url('mensagens'); ?>">Mensagens</a>

                                    <?php
                                            break;
                                    }
                                    ?>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('deslogar'); ?>">Deslogar</a>

                                <?php
                                } else {
                                    ?>

                        <li class="nav-item navegacao_header"><a class="navegacao_a" href="<?php echo base_url('login'); ?>">Login</a></li>

                    <?php
                    }
                    ?>

            </div>
            </li>
            </ul>
            </div>

        </nav>
    </header>
    <section class="fundo">