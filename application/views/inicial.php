<?php

    $dados['title_do_header'] = 'Monteiro Lobato';
    $this->load->view('include/header', $dados);

?>

<div>
    <?php
        echo '<div class="disposicao">';
    for ($i = 0; $i < count($listas[0]); $i++) {
        echo '<div class="not">';
        echo '<div>';
        echo $listas[0][$i];
        echo '</div><div>';
        echo $listas[1][$i];
        echo '</div>';
        echo '</div>';
    }
        echo '</div>';
    ?>
</div>

<?php

    $this->load->view('include/footer');

?>