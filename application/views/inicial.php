<?php

    $dados['title_do_header'] = 'Monteiro Lobato';
    $this->load->view('include/header', $dados);

?>

<div>
    <?php
        echo '<div class="disposicao">';
    for ($i = 0; $i < count($listas[0]); $i++) {
        echo '<div class="not">';
        echo '<p><b>';
        echo $listas[0][$i];
        echo '</b></p><p>';
        echo $listas[1][$i];
        echo '</p>';
        echo '</div>';
    }
        echo '</div>';
    ?>
</div>

<?php

    $this->load->view('include/footer');

?>