<?php

$dados['title_do_header'] = 'Login';
$this->load->view('include/header', $dados);

?>

<div>
    <?php
        if (isset($msg)) {
            echo $msg;
        }
    ?>
    <fieldset>
        <form action="<?php echo base_url('logar'); ?>" method="post">
            <input type="radio" name="permissao_user" id="" value="3" checked>Locador
            <input type="radio" name="permissao_user" id="" value="2">Bibliotecário
            <input type="radio" name="permissao_user" id="" value="1">Administrador
            <br><br>
            <label for="">ID:</label>
            <input type="text" name="id_user" id="">
            <label for="">Senha:</label>
            <input type="password" name="pass_user" id="">
            <input type="submit" value="Logar">
        </form>
    </fieldset>
</div>

<?php

$this->load->view('include/footer');

?>