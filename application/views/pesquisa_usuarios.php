<?php

$dados['title_do_header'] = 'Pesquisa de usuários';
$this->load->view('include/header', $dados);

?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>



<div>
    <form class="form-horizontal" method="post" action="<?php echo base_url('pesquisa_users') ?>">
        <fieldset>

            <!-- Form Name -->
            <legend>Form Name</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput"></label>
                <div class="col-md-4">
                    <input id="nm_pessoa" name="nm_pessoa" type="text" placeholder="Pesquisar" class="form-control input-md" <?php if (isset($nm_pessoa)) {
                                                                                                                                    echo "value=" . $nm_pessoa;
                                                                                                                                } ?>>

                </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tp_user"></label>
                <div class="col-md-4">
                    <label class="radio-inline" for="tp_user-0">
                        <input type="radio" name="tp_user" id="tp_user-0" value="3" <?php if (isset($tp_user) && $tp_user == 3) {
                                                                                        echo 'checked';
                                                                                    } else if (!isset($tp_user)) {
                                                                                        echo 'checked';
                                                                                    } ?>>
                        Locador
                    </label>
                    <label class="radio-inline" for="tp_user-1">
                        <input type="radio" name="tp_user" id="tp_user-1" value="2" <?php if (isset($tp_user) && $tp_user == 2) {
                                                                                        echo 'checked';
                                                                                    } ?>>
                        Bibliotecário
                    </label>
                    <label class="radio-inline" for="tp_user-2">
                        <input type="radio" name="tp_user" id="tp_user-2" value="1" <?php if (isset($tp_user) && $tp_user == 1) {
                                                                                        echo 'checked';
                                                                                    } ?>>
                        Administrador
                    </label>
                    <label class="radio-inline" for="tp_user-3">
                        <input type="radio" name="tp_user" id="tp_user-3" value="4" <?php if (isset($tp_user) && $tp_user == 4) {
                                                                                        echo 'checked';
                                                                                    } ?>>
                        Todos
                    </label>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_pesquisa"></label>
                <div class="col-md-4">
                    <button id="bt_pesquisa" name="bt_pesquisa" class="btn btn-info">Pesquisar</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

<div>
    <table class="table table-bordered table-striped table-light">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Permissao</th>
            <th>Ações</th>
        </tr>

        <?php
        $vazio = true;
        foreach ($tabelaUsers as $row => $value) {
            $vazio = false;
            ?>
            <tr>
                <td><?php echo $value['id_pessoa']; ?></td>
                <td><?php echo $value['nm_pessoa']; ?></td>
                <td><?php echo $value['nu_telefone']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php if ($value['permissao'] > 3) {
                            echo "Desativado";
                        } else {
                            echo $value['permissao'];
                        }  ?></td>
                <td>
                    <a href="<?php echo base_url('edit_user/') . $value['id_pessoa']; ?>"> Editar |</a>
                    <a href="<?php echo base_url('edit_status/') . $value['id_pessoa'] . '/' . $value['permissao']; ?>">| <?php if ($value['permissao'] > 3) {
                                                                                                                                    echo "Ativar";
                                                                                                                                } else {
                                                                                                                                    echo "Desativar";
                                                                                                                                }  ?> </a>
                </td>
            </tr>
        <?php }
        if ($vazio) { ?>
            <tr>
                <td colspan="6">Não foram encontrados resultados correspondentes</td>
            </tr>
        <?php    }
        ?>

    </table>

    <?php print_r($paginacao); ?>

</div>


<?php

$this->load->view('include/footer');

?>