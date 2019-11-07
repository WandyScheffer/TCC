<?php

$dados['title_do_header'] = 'Informações';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_info">

        <?php
        $cont = 0;
        foreach ($objeventos as $row) {
            $cont++;
            echo

                "<div class='info'>
                <div class='titulo'><h3>" . $row->titulo . "</h3></div>
                <div class='dt_prev'>Previsão: " . $row->dt_prevista . "</div>
                <div class='dt_public'>Publicado em: " . $row->dt_publicacao . "</div>
                <div class='desc'>" . $row->conteudo . "</div>
            </div>"; ?>
            <br>
            <br>
        <?php
        }
        ?>
        <br>
        <?php

        echo "<div>".$paginacao."</div>";

        ?>

    </div>
</div>

<?php

$this->load->view('include/footer');

?>