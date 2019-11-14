<?php
$dados['title_do_header'] = 'controle de conteudos';
$this->load->view('include/header', $dados);

?>

<div class="dispo_inser_conte">
    <div class="fundo_inser_conteudo">
        <form action="<?php echo base_url('multa') ?>" method="post">
            <fieldset>
                <legend>Multa</legend>
                <br>
                <label for="">Valor multa:</label>
                <input class="form-control-referente" type="number" name="valor" id="" value="<?php echo $valor ?>">
                <br>
                <br>
                <input class="btn btn-primary" type="submit" value="Atualizar">
            </fieldset>
        </form>

        <form action="<?php echo base_url('atualiza_sobre') ?>" method="post">
            <fieldset>
                <legend>Sobre</legend>

                <label for="">Novo Titulo:</label>
                <input class="form-control-referente" type="text" name="nv_titulo" id="" value="<?php echo $antigoTitulo ?>"><br><br>

                <label for="">Novo sobre:</label><br>
                <textarea class="form-control-referente" name="nv_sobre" id="" cols="30" rows="10"><?php echo $antigoSobre ?></textarea><br>
                <input class="btn btn-primary" type="submit" value="Atualizar">
            </fieldset>
        </form>

        <form action="<?php echo base_url('cad_info') ?>" method="post">
            <fieldset>
                <legend>Noticias</legend>
                <label for="">Titulo:</label>
                <input class="form-control-referente" type="text" name="titulo"><br><br>
                <label for="">Data prevista:</label>
                <input class="form-control-referente" type="date" name="dt_prevista">
                <br>
                <br>
                <label for="">Conteudo:</label>
                <br>
                <textarea class="form-control-referente" name="noticia" id="" cols="30" rows="10"></textarea><br>
                <input class="btn btn-primary" type="submit" value="Atualizar">
            </fieldset>
        </form>
    </div>
</div>
<?php
$this->load->view('include/footer');
?>