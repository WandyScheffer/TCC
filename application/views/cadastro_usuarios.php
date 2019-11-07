<?php
$dados['title_do_header'] = 'cadastro de usuarios';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_cad_user">

        <?php if (isset($verificacao)) {
            echo $verificacao;
        } ?>
        <form class="form-horizontal" method="post" <?php if (!isset($id_pessoa)) { ?> action="<?php echo base_url('cadastrar') ?>">
    
        <?php } else { ?>
    
            action="<?php echo base_url('edicao_user/').$id_pessoa ?>">
    
        <?php } ?>
        <fieldset>
    
            <!-- Form Name -->
            <?php if (!isset($id_pessoa)) { ?>
                <legend>Cadastro</legend>
    
                <!-- Multiple Radios (inline) -->
    
    
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tp_user">Tipo de usuários:</label>
                    <div class="col-md-4">
                        <label class="radio-inline" for="tp_user-0">
                            <input type="radio" name="tp_user" id="tp_user-0" value="3" checked="checked">
                            Locador
                        </label>
                        <label class="radio-inline" for="tp_user-1">
                            <input type="radio" name="tp_user" id="tp_user-1" value="2">
                            Bibliotecário
                        </label>
                        <label class="radio-inline" for="tp_user-2">
                            <input type="radio" name="tp_user" id="tp_user-2" value="1">
                            Administrador
                        </label>
                    </div>
                </div>
    
            <?php } else {
                setcookie('id_user', $id_pessoa);
                ?>
    
                <legend>Editar Usuário</legend>
    
                <div class="form-group">
                    <label class="col-md-4 control-label" for="id_user">Código do usuário:</label>
                    <div class="col-md-4">
                        <input disabled id="id_user" <?php if (isset($id_pessoa)) {
                                                                echo 'value="' . $id_pessoa . '"';
                                                            } ?> name="id_user" type="text" class="form-control input-md">
    
                    </div>
                </div>
    
            <?php } ?>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nm_user">Nome:</label>
                <div class="col-md-4">
                    <input id="nm_user" <?php if (isset($nm_pessoa)) {
                                            echo 'value="' . $nm_pessoa . '"';
                                        } ?> name="nm_user" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cpf">CPF:</label>
                <div class="col-md-4">
                    <input id="cpf" <?php if (isset($nu_cpf)) {
                                        echo 'value="' . $nu_cpf . '"';
                                    } ?> name="cpf" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tel">Telefone:</label>
                <div class="col-md-4">
                    <input id="tel" <?php if (isset($nu_telefone)) {
                                        echo 'value="' . $nu_telefone . '"';
                                    } ?> name="tel" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email:</label>
                <div class="col-md-4">
                    <input id="email" <?php if (isset($email)) {
                                            echo 'value="' . $email . '"';
                                        } ?> name="email" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="senha">Senha:</label>
                <div class="col-md-4">
                    <input id="senha" <?php if (isset($senha)) {
                                            echo 'value="' . $senha . '"';
                                        } ?> name="senha" type="password" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cep">CEP:</label>
                <div class="col-md-4">
                    <input id="cep" <?php if (isset($cep)) {
                                        echo 'value="' . $cep . '"';
                                    } ?> name="cep" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nu_endereco">N° Endereço:</label>
                <div class="col-md-4">
                    <input id="nu_endereco" <?php if (isset($nu_endereco)) {
                                                echo 'value="' . $nu_endereco . '"';
                                            } ?> name="nu_endereco" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="complemento">Complemento:</label>
                <div class="col-md-4">
                    <input id="complemento" <?php if (isset($complemento)) {
                                                echo 'value="' . $complemento . '"';
                                            } ?> name="complemento" type="text" placeholder="" class="form-control input-md" required="">
    
                </div>
            </div>
    
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_cad_user"></label>
                <div class="col-md-4">
                    <button id="bt_cad_user" name="bt_cad_user" class="btn btn-primary">
                        <?php if (!isset($id_pessoa)) { ?>
    
                            Cadastrar
    
                        <?php } else { ?>
    
                            Atualizar
    
                        <?php } ?></button>
                </div>
            </div>
    
        </fieldset>
        </form>
    </div>
</div>

<?php
$this->load->view('include/footer');
?>