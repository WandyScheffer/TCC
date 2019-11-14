<?php

$dados['title_do_header'] = 'locação';
$this->load->view('include/header', $dados);

?>
<div class="disposicao">
    <div class="fundo_locacao">
        <?php
        if (isset($msg)) {
            print_r($msg); //fazer um alert talvez
        }
        if (isset($retorno)) {
            // print_r($retorno);
        }
        ?>
        <div style="width: 90%;">
            <div style="border-bottom:1px solid #0098DA; display:flex; justify-content: center; margin-bottom: 5%;">
                <a href="<?php echo base_url('locacoes');  ?>" id="bt_renovar" name="bt_renovar" class="" style="color:lightgreen; font-weight: bold; padding-right: 80px; padding-bottom: 20px; padding-top: 20px;">Manipular Locação</a>
                <a href="<?php echo base_url('locacoes/lista');  ?>" id="bt_renovar" name="bt_renovar" class="" style="color:#0098DA; font-weight: bold; padding-left: 80px; padding-bottom: 20px; padding-top: 20px;">Lista Locação</a>
            </div>

            <!--------------------------------------------- locar o livro --------------------------------------------- -->
            <form class="form-horizontal" style="margin-bottom: 5%;" method="post" action="<?php echo base_url('locando'); ?>">
                <fieldset>

                    <!-- Form Name -->
                    <legend></legend>
                    <div class="form-row">
                        <!-- Text input-->
                        <div class="" style="width: 40%;">
                            <label class="col-md-4 control-label" for="id_locador">ID Locador:</label>
                            <div class="col-md-4">
                                <input id="id_locador" name="id_locador" type="number" min="1" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="" style="width: 40%;">
                            <label class="col-md-4 control-label" for="id_exemplar">ID Exemplar:</label>
                            <div class="col-md-4">
                                <input id="id_exemplar" name="id_exemplar" type="number" min="1" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="bt_locar"></label>
                        <div class="col-md-4">
                            <button id="bt_locar" name="bt_locar" class="btn btn-primary">Locar</button>
                        </div>
                    </div>

                </fieldset>
            </form>

            <!--------------------------------------------- manusear locação --------------------------------------------- -->
            <form class="form-horizontal" method="post" action="<?php echo base_url('manuseia_locacao'); ?>">
                <fieldset>

                    <!-- Form Name -->
                    <legend></legend>
                    <div class="inferior_locacao" style="display: flex; flex-direction: row;">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="id_locador_devolucao">ID Locador:</label>
                            <div class="col-md-8">
                                <input id="id_locador_devolucao" value="<?php if (isset($id_usuario)) {
                                    echo $id_usuario;
                                } ?>" name="id_locador_devolucao" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                        <table class="table table-bordered" style="width: 30%;">
                            <tr>
                                <th>Livro</th>
                                <th>Valor Multa</th>
                            </tr>
                            <tr>
                                <td><?php if (isset($retorno)) {
                                        echo $retorno['nm_titulo'];
                                    } ?></td>
                                <td><?php if (isset($retorno)) {
                                        if ($retorno['multa'] >= 0) {

                                            echo $retorno['multa'];
                                        } else {
                                            echo '0';
                                        }
                                    } ?></td>
                            </tr>
                        </table>


                    </div>

                    <div class="form-row" style="display: flex; justify-content: center;">
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bt_pesquisa"></label>
                            <div class="col-md-4">
                                <button id="bt_pesquisar" name="bt_pesquisar" value="1" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bt_encerrar"></label>
                            <div class="col-md-4">
                                <button id="bt_encerrar" name="bt_encerrar" value="1" class="btn btn-primary">Encerrar</button>
                            </div>
                        </div>

                        <!-- Button -->
                        <?php if (isset($retorno['multa']) && $retorno['multa'] <= 0) { ?>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="bt_renovar"></label>
                                <div class="col-md-4">
                                    <button id="bt_renovar" name="bt_renovar" value="1" class="btn btn-primary">Renovar</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </fieldset>
            </form>

        </div>

    </div>
</div>




<?php

$this->load->view('include/footer');

?>