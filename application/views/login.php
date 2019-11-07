<?php

$dados['title_do_header'] = 'Login';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_login">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <form action="<?php echo base_url('logar'); ?>" method="post">
            <div class="form-group">
                <input type="radio" name="permissao_user" id="" value="3" checked>Locador
                <input type="radio" name="permissao_user" id="" value="2">Bibliotecário
                <input type="radio" name="permissao_user" id="" value="1">Administrador
            </div>
            <div class="form-group">
                <label for="">Código:</label>
                <input class="form-control-login" type="text" name="id_user" id="">
            </div>
            <div class="form-group">
                <label for="">Senha:</label>
                <input class="form-control-login" type="password" name="pass_user" id="">
            </div>
            <div class="form-group btn_logar">

                <button id="singlebutton" name="btn_logar" class="btn btn-primary">Logar</button>

            </div>



            <!-- ------------------------------------------------------------------------------------ -->

            <!-- Multiple Radios (inline) -->
            <!-- <div class="form-group">
                <label class="col-md-4 control-label" for="permissao_user"></label>
                <div class="col-md-4">
                    <label class="radio-inline" for="permissao_user-0">
                        <input type="radio" name="permissao_user" id="permissao_user-0" value="3" checked="checked">
                        Locador
                    </label>
                    <label class="radio-inline" for="permissao_user-1">
                        <input type="radio" name="permissao_user" id="permissao_user-1" value="2">
                        Bibliotecário
                    </label>
                    <label class="radio-inline" for="permissao_user-2">
                        <input type="radio" name="permissao_user" id="permissao_user-2" value="1">
                        Administrador
                    </label>
                </div>
            </div> -->

            <!-- Text input-->

            <!-- <div class="">

                
                    <label class="" for="id_user">ID:</label>
                    <input id="id_user" name="id_user" type="text" placeholder="" class="form-control" required="">

                
            </div> -->

            <!-- Text input-->

            <!-- <div class="form-group">
                <label class="col-md-4 control-label" for="pass_user">Senha:</label>
                <div class="col-md-4">
                    <input id="pass_user" name="pass_user" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div> -->

            <!-- Button -->

            <!-- <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Logar</button>
                </div>
            </div> -->

        </form>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>