<?php

$dados['title_do_header'] = 'locação';
$this->load->view('include/header', $dados);

?>
<div class="disposicao">
    <div class="fundo_locacao">
        <div style="width: 90%;">
            <div style="border-bottom:1px solid #0098DA; display:flex; justify-content: center; margin-bottom: 5%;">
                <a id="bt_renovar" name="bt_renovar" class="btn" style="color:lightgreen; font-weight: bold; padding-right: 80px; padding-bottom: 20px; padding-top: 20px;">Manipular Locação</a>
                <a id="bt_renovar" name="bt_renovar" class="btn" style="color:#0098DA; font-weight: bold; padding-left: 80px; padding-bottom: 20px; padding-top: 20px;">Lista Locação</a>
            </div>
            <form class="form-horizontal" style="margin-bottom: 5%;">
                <fieldset>

                    <!-- Form Name -->
                    <legend></legend>
                    <div class="form-row">
                        <!-- Text input-->
                        <div class="" style="width: 40%;">
                            <label class="col-md-4 control-label" for="id_locador">ID Locador:</label>
                            <div class="col-md-4">
                                <input id="id_locador" name="id_locador" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="" style="width: 40%;">
                            <label class="col-md-4 control-label" for="id_exemplar">ID Exemplar:</label>
                            <div class="col-md-4">
                                <input id="id_exemplar" name="id_exemplar" type="text" placeholder="" class="form-control input-md" required="">

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

            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend></legend>
                    <div class="inferior_locacao" style="display: flex; flex-direction: row;">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-8 control-label" for="id_locador_devolucao">ID Locador:</label>
                            <div class="col-md-8">
                                <input id="id_locador_devolucao" name="id_locador_devolucao" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                        <table class="table table-bordered" style="width: 30%;">
                            <tr>
                                <th>Livro</th>
                                <th>Valor Multa</th>
                            </tr>
                            <tr>
                                <td>LIVROA2</td>
                                <td>0</td>
                            </tr>
                        </table>

                    </div>

                    <div class="form-row" style="display: flex; justify-content: center;">
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bt_pesquisa"></label>
                            <div class="col-md-4">
                                <button id="bt_pesquisa" name="bt_pesquisa" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bt_encerrar"></label>
                            <div class="col-md-4">
                                <button id="bt_encerrar" name="bt_encerrar" class="btn btn-primary">Encerrar</button>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bt_renovar"></label>
                            <div class="col-md-4">
                                <button id="bt_renovar" name="bt_renovar" class="btn btn-primary">Renovar</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>

    </div>
</div>




<?php

$this->load->view('include/footer');

?>