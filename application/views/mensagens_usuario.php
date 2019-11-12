<?php

$dados['title_do_header'] = 'Mensagens';
$this->load->view('include/header', $dados);

?>
<div class="fundo_formulario">
    <div class="fundo_estilo_formulario table-responsive">
        <div style="width:90%">

            <form class="form-horizontal" method="post" action="<?php echo base_url('enviando') ?>">
                <fieldset>

                    <!-- Form Name -->
                    <legend></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titulo_msg">Titulo:</label>
                        <div class="col-md-4">
                            <input id="titulo_msg" name="titulo_msg" type="text" placeholder="" class="form-control input-md" required="">
                        </div>

                        <?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] != 3) { ?>
                            <label class="col-md-4 control-label" for="id_dst">ID Destino:</label>
                            <div class="col-md-4">
                                <input id="id_dst" name="id_dst" type="number" min="1" placeholder="" class="form-control input-md" required>
                            </div>
                        <?php } else { ?>
                            <label class="col-md-4 control-label" for="id_dst">ID exemplar:</label>
                            <div class="col-md-4">
                                <input id="id_coment_livro" type="number" name="id_coment_livro" type="text" placeholder="" class="form-control input-md">
                            </div>

                        <?php } ?>

                        <?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 3) { ?>
                            <!-- <label class="col-md-4 control-label" for="nt_livro">Nota livro:</label>
                            <div class="col-md-4">
                                <input id="nt_livro" name="nt_livro" type="text" placeholder="" class="form-control input-md">

                            </div> -->
                        <?php } ?>

                        <label class="col-md-4 control-label" for="desc_msg">Mensagem:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="desc_msg" name="desc_msg" <?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] != 3) {
                                                                                                echo 'required';
                                                                                            } ?>></textarea>
                        </div>
                        <label class="col-md-4 control-label" for="bt_envia_msg"></label>
                        <div class="col-md-4">
                            <button id="bt_envia_msg" name="bt_envia_msg" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>



                </fieldset>
            </form>
        </div>

        <table class="table table-bordered table-striped table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Ação</th>

            </tr>

            <?php foreach ($listaMensagens as $linha) { ?>
                <tr>
                    <td><?php echo $linha['id_envio'] ?></td>
                    <td><?php echo $linha['nm_pessoa'] ?></td>
                    <td><?php echo $linha['nm_titulo'] ?></td>
                    <td><?php echo $linha['conteudo'] ?></td>
                    <td><a href="<?php echo base_url('lido/') . $linha['id_msg'] ?>" class="btn btn-outline-success">Marcar como lida</a></td>

                </tr>

            <?php } ?>



            <!-- <tr>
                <td>5</td>
                <td>Jonas</td>
                <td>Duvida</td>
                <td>vim perguntar se...</td>
                <td><a href="" class="btn btn-outline-success">Marcar como lida</a></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Trevor</td>
                <td>Livro</td>
                <td>tenho uma sugestão...</td>
                <td><a href="" class="btn btn-outline-success">Marcar como lida</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Mike</td>
                <td>Locacao</td>
                <td>posso pedir para...</td>
                <td><a href="" class="btn btn-outline-success">Marcar como lida</a></td>
            </tr>
            <tr>
                <td>13</td>
                <td>Tina</td>
                <td>Duvida</td>
                <td>como faço...</td>
                <td><a href="" class="btn btn-outline-success">Marcar como lida</a></td>
            </tr> -->
        </table>
        <?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] != 3) { ?>

            <br><br>
            <table class="table table-bordered table-striped table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Livro</th>
                    <th>Titulo comentario</th>
                    <th>Conteudo</th>
                    <th>Ação</th>
                </tr>
                <?php foreach ($listaComentarios as $linha) { ?>
                    <tr>
                        <td><?php print_r($linha['id_locador']) ?></td>
                        <td><?php print_r($linha['nm_pessoa']) ?></td>
                        <td><?php print_r($linha['livro']) ?></td>
                        <td><?php print_r($linha['nm_titulo']) ?></td>
                        <td><?php print_r($linha['conteudo_coment']) ?></td>
                        <td><a href="<?php echo base_url('analisa/1/') . $linha['id_coment'] ?>" class="btn btn-outline-success">Aceitar</a> <a href="<?php echo base_url('analisa/2/') . $linha['id_coment'] ?>" class="btn btn-outline-danger">Negar</a></td>
                        <!-- <td><?php //print_r($linha['id_coment']) 
                                            ?></td> -->
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
        <!-- <div><a href="">1 - 2 - 3</a></div> -->
    </div>
</div>

<?php

$this->load->view('include/footer');

?>