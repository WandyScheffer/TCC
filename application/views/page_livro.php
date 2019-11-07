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
        <div class="inferior_livro">
            <table class="table table-bordered table-striped table-light">

                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla cursus magna, in viverra neque euismod id. Suspendisse ornare, sapien vitae elementum blandit, orci massa feugiat dui, id tempor ex magna nec turpis. Vivamus viverra pulvinar facilisis. Morbi diam dui, faucibus in massa sed, posuere vehicula sapien. Ut a aliquet.</td>

                </tr>
                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla cursus magna, in viverra neque euismod id. Suspendisse ornare, sapien vitae elementum blandit, orci massa feugiat dui, id tempor ex magna nec turpis. Vivamus viverra pulvinar facilisis. Morbi diam dui, faucibus in massa sed, posuere vehicula sapien. Ut a aliquet.</td>

                </tr>
                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla cursus magna, in viverra neque euismod id. Suspendisse ornare, sapien vitae elementum blandit, orci massa feugiat dui, id tempor ex magna nec turpis. Vivamus viverra pulvinar facilisis. Morbi diam dui, faucibus in massa sed, posuere vehicula sapien. Ut a aliquet.</td>

                </tr>
            </table>
        </div>
        <div><a href="">1 - 2 - 3</a></div>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>