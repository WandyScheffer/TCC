<?php

$dados['title_do_header'] = 'Sobre';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_sobre">
        <?php
        echo '<h1>'.$titulo.'</h1>';
        echo '<br>';
        echo '<h6>'.$conteudo.'</h6>';
        ?>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>