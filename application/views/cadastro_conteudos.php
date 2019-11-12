<?php
$dados['title_do_header'] = 'controle de conteudos';
$this->load->view('include/header', $dados);

?>

<div class="dispo_inser_conte">
    <div class="fundo_inser_conteudo">
        <form action="<?php echo base_url('multa') ?>" method="post">
            <fieldset>
                <legend>Multa</legend>
                <label for="">Valor multa:</label>
                <input type="number" name="valor" id="" value="<?php echo $valor ?>">
                <input type="submit" value="Atualizar">
            </fieldset>
        </form>

        <form action="<?php echo base_url('atualiza_sobre') ?>" method="post">
            <fieldset>
                <legend>Sobre</legend>

                <label for="">Novo Titulo</label>
                <input type="text" name="nv_titulo" id="" value="<?php echo $antigoTitulo ?>"><br><br>

                <label for="">Novo sobre:</label>
                <textarea name="nv_sobre" id="" cols="30" rows="10"><?php echo $antigoSobre ?></textarea>
                <input type="submit" value="Atualizar">
            </fieldset>
        </form>

        <form action="<?php echo base_url('cad_info') ?>" method="post">
            <fieldset>
                <legend>Noticias</legend>
                <label for="">Titulo:</label>
                <input type="text" name="titulo">
                <label for="">Data prevista:</label>
                <input type="date" name="dt_prevista">
                <br>
                <br>
                <label for="">Conteudo:</label>
                <br>
                <textarea name="noticia" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Atualizar">
            </fieldset>
        </form>
    </div>
</div>
<?php
$this->load->view('include/footer');
?>