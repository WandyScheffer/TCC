<?php

$dados['title_do_header'] = 'Locações - lista';
$this->load->view('include/header', $dados);

?>
<div class="disposicao">
    <div class="fundo_locacao ">
        <div style="width: 90%;">
            <div style="border-bottom:1px solid #0098DA; display:flex; justify-content: center; margin-bottom: 5%;">
                <a href="<?php echo base_url('locacoes');  ?>" id="bt_renovar" name="bt_renovar" class="" style="color:lightgreen; font-weight: bold; padding-right: 80px; padding-bottom: 20px; padding-top: 20px;">Manipular Locação</a>
                <a href="<?php echo base_url('locacoes/lista');  ?>" id="bt_renovar" name="bt_renovar" class="" style="color:#0098DA; font-weight: bold; padding-left: 80px; padding-bottom: 20px; padding-top: 20px;">Lista Locação</a>
            </div>
            <div class="table-responsive lista_locacoes_superior">

                <table class="table table-bordered table-striped table-light ">
                    <tr>
                        <th>Id locador</th>
                        <th>Nome</th>
                        <th>Livro</th>
                        <th>Cod exemplar</th>
                        <th>Valor pago</th>
                        <!-- <th>Multa</th> -->
                        <th>Data locado</th>
                        <th>Data para entrega</th>
                        <th>Entregue em</th>
                        <th>Quem locou</th>


                    </tr>
                    <?php foreach ($tabelaLocacao as $linha) { ?>
                        <tr>
                            <td><?php print_r($linha['id_pessoa']) ?></td>
                            <td><?php print_r($linha['locador']) ?></td>
                            <td><?php print_r($linha['titulo']) ?></td>
                            <td><?php print_r($linha['id_exemplar']) ?></td>
                            <td><?php print_r($linha['vl_pago']) ?></td>
                            <!-- <td><?php //print_r($linha['multa']) 
                                            ?></td> -->
                            <td><?php print_r($linha['dt_locacao']) ?></td>
                            <td><?php print_r($linha['dt_devolucao_prevista']) ?></td>
                            <td><?php print_r($linha['dt_devolucao']) ?></td>
                            <td><?php print_r($linha['biblio_locar']) ?></td>

                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="lista_locacoes_inferior"><?php echo $paginacao; ?></div>
            </div>
        </div>
    </div>




    <?php

    $this->load->view('include/footer');

    ?>