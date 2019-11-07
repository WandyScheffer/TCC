<?php

$dados['title_do_header'] = 'Livro';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_locador table-responsive">
        <div class="superior_livro">

            <span>Título:</span>
            <span>Autor(es):</span>
            <span>Gênero(s):</span>
            <span>Numero de exemplares:</span>
            <span>Avaliação:</span>


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