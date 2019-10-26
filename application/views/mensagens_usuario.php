<?php

$dados['title_do_header'] = 'Mensagens';
$this->load->view('include/header', $dados);

?>
<div class="fundo_formulario">
    <div class="fundo_estilo_formulario">
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend></legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="titulo_msg">Titulo:</label>
                    <div class="col-md-4">
                        <input id="titulo_msg" name="titulo_msg" type="text" placeholder="" class="form-control input-md" required="">
                    </div>
                    <label class="col-md-4 control-label" for="id_dst">ID Destino:</label>
                    <div class="col-md-4">
                        <input id="id_dst" name="id_dst" type="text" placeholder="" class="form-control input-md">
                    </div>
                    <label class="col-md-4 control-label" for="nt_livro">Nota livro:</label>
                    <div class="col-md-4">
                        <input id="nt_livro" name="nt_livro" type="text" placeholder="" class="form-control input-md">

                    </div>
                    <label class="col-md-4 control-label" for="desc_msg">Mensagem:</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="desc_msg" name="desc_msg"></textarea>
                    </div>
                    <label class="col-md-4 control-label" for="bt_envia_msg"></label>
                    <div class="col-md-4">
                        <button id="bt_envia_msg" name="bt_envia_msg" class="btn btn-primary">Enviar</button>
                    </div>
                </div>

                

            </fieldset>
        </form>
        <table class="table table-bordered table-striped table-light">
            <tr>
                <th>Titulo</th>
                <th>Autor(es)</th>
                <!--array-->
                <th>Genero(s)</th>
                <!--array-->
                <th>ISBN</th>
                <th>Disponibilidade no momento</th>
                <!--contar o que tem dentro da array -->
            </tr>
            <tr>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
            </tr>
            <tr>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
            </tr>
            <tr>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
                <td>teste</td>
            </tr>
        </table>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>