<?php

    $dados['title_do_header'] = 'Sobre';
    $this->load->view('include/header', $dados);

?>

<div>
    <?php
    echo $titulo;
    echo '<br>';
    echo $conteudo;
    ?>
</div>

<?php

    $this->load->view('include/footer');

?>