<?php

    $dados['title_do_header'] = 'Informações';
    $this->load->view('include/header', $dados);

?>

<div>
    <?php
        foreach ($objeventos as $row) {
            echo 
            "data previ: "
            .$row->dt_prevista.
            " ||   data publi: "
            .$row->dt_publicacao.
            " ||   titulo: "
            .$row->titulo.
            " ||  O q é? "
            .$row->conteudo;?>
        <br>
        <br>
    <?php
        }
    ?>
    <br>
    <?php

        echo $paginacao
    
    ?>
    Conteúdo informações

</div>

<?php

    $this->load->view('include/footer');

?>