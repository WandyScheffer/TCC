<?php

$dados['title_do_header'] = 'Livro';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_locador table-responsive">

        <div class="superior_livro">
            <?php
            $chaves = array('{', '}');
            // echo (str_replace($chaves, '', $value['autores']));
            ?>
            <span>Título: <?php echo $infoLivro['nm_titulo']; ?></span>
            <span>Autor(es): <?php echo (str_replace($chaves, '', $infoLivro['autores'])); ?></span>
            <span>Gênero(s): <?php echo (str_replace($chaves, '', $infoLivro['generos'])); ?></span>
            <span>Numero de exemplares: <?php
                                        $size = sizeof(explode(',', str_replace($chaves, '', $infoLivro['exemplares'])));
                                        $liste = (explode(',', str_replace($chaves, '', $infoLivro['exemplares'])));
                                        $cont_disponiveis = 0;
                                        for ($i = 0; $i < $size; $i++) {
                                            if ($liste[$i] != '') {
                                                $cont_disponiveis++;
                                            }
                                        }
                                        echo $cont_disponiveis;

                                        ?></span>
            <!--<span>Avaliação: <?php //echo $infoLivro['']; 
                                    ?></span>-->



        </div>

        <?php
        if (isset($_SESSION['permissao'])) {


            if ($_SESSION['permissao'] != 3) { ?>
                <a id="singlebutton" name="btn_logar" class="btn btn-primary" style="color:white" href="<?php echo base_url('edit_livro/') . $infoLivro['id_livro'] ?>">Editar informações</a>
                <br>
        <?php }
        } ?>



        <div class="inferior_livro">
            <table class="table table-bordered table-striped table-light">
                <?php
                foreach ($tabelaComent as $tupla) { ?>
                    <tr>
                        <th><?php print_r($tupla['nm_titulo']); ?></th>
                        <td><?php print_r($tupla['conteudo_coment']); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div><?php echo $paginacao; ?></div>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>