<?php
$dados['title_do_header'] = 'Editar livros';
$this->load->view('include/header', $dados);
// print_r($livro);
?>
<div class="disposicao">
    <div class="fundo_cad_edit_livro">
        <!-- <h1>N ta pronto ainda o edit</h1> -->
        <form class="form-horizontal" method="post" action="<?php echo base_url('editar_livro/').$livro['id_livro'] ?>">
            <fieldset>

                <!-- Form Name -->
                <legend></legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nm_titulo">Título:</label>
                    <div class="col-md-4">
                        <input value="<?php echo $livro['nm_titulo'] ?>" id="nm_titulo" name="nm_titulo" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>
                <?php
                    $chaves = array('{', '}');
                    $ids_autores = explode(',', str_replace($chaves, '', $livro['autores']));
                    $ids_generos = explode(',', str_replace($chaves, '', $livro['generos']));
                    
                

                ?>
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="select_autores">Autor:</label>
                    <div class="col-md-4">
                        <select id="select_autores" name="select_autores1" class="form-control" required>
                            <option value="">Vazio</option>
                            <?php
                            for ($i = 0; $i < count($lista_autores[0]); $i++) {
                                ?>
                                <option value="<?php echo $lista_autores[0][$i]  ?>" <?php if (isset($ids_autores)) {
                                                                                                if ($lista_autores[0][$i] == $ids_autores[0]) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?php echo $lista_autores[1][$i] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="select_autores">Autor:</label>
                    <div class="col-md-4">
                        <select id="select_autores" name="select_autores2" class="form-control">
                            <option value="">Vazio</option>
                            <?php
                            for ($i = 0; $i < count($lista_autores[0]); $i++) {
                                ?>
                                <option value="<?php echo $lista_autores[0][$i]  ?>" <?php if (isset($ids_autores)) {
                                                                                                if (sizeof($ids_autores)>=2) {
                                                                                                    if ($lista_autores[0][$i] == $ids_autores[1]) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                    
                                                                                                }
                                                                                            } ?>><?php echo $lista_autores[1][$i] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="select_autores">Autor:</label>
                    <div class="col-md-4">
                        <select id="select_autores" name="select_autores3" class="form-control">
                            <option value="">Vazio</option>
                            <?php
                            for ($i = 0; $i < count($lista_autores[0]); $i++) {
                                ?>
                                <option value="<?php echo $lista_autores[0][$i]  ?>" <?php if (isset($ids_autores)) {
                                                                                                if (sizeof($ids_autores)>=3) {
                                                                                                    if ($lista_autores[0][$i] == $ids_autores[2]) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                    
                                                                                                }
                                                                                            } ?>><?php echo $lista_autores[1][$i] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <!-- _________________ Botão de add autores... provavel que tenha js ou algo do tipo ___________ -->
                <!-- <div class="form-group">
                    <label class="col-md-4 control-label" for="bt_ad_autores"></label>
                    <div class="col-md-4">
                        <div id="bt_ad_autores" onclick="teste()" name="bt_ad_autores" class="btn btn-primary">+</div>
                    </div>
                </div> -->

                <!-- Text input-->
                <!-- _________________ Caixas de novos autores... provavel que seja inserida via js ou algo do tipo ___________ -->
                <!-- <div class="form-group">
                    <label class="col-md-4 control-label" for="nv_autor">Novo autor:</label>
                    <div class="col-md-4">
                        <input id="nv_autor" name="nv_autor" type="text" placeholder="" class="form-control input-md">
    
                    </div>
                </div> -->

                <!-- Button -->
                <!-- _________________ Botão de novos autores... provavel que tenha js ou algo do tipo ___________ -->
                <!-- <div class="form-group">
                    <label class="col-md-4 control-label" for="bt_ad_nv_autor"></label>
                    <div class="col-md-4">
                        <div id="bt_ad_nv_autor" name="bt_ad_nv_autor" class="btn btn-primary">+</div>
                    </div>
                </div> -->

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="isbn">ISBN:</label>
                    <div class="col-md-4">
                        <input value="<?php echo $livro['cod_isbn'] ?>" id="isbn" name="isbn" type="text" placeholder="" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="select_generos">Gênero:</label>
                    <div class="col-md-4">
                        <select id="select_generos" name="select_generos1" class="form-control" required>
                            <option value="">Vazio</option>
                            <?php
                            for ($i = 0; $i < count($lista_generos[0]); $i++) {
                                ?>
                                <option value="<?php echo $lista_generos[0][$i]  ?>" <?php if (isset($ids_generos)) {
                                                                                                if ($lista_generos[0][$i] == $ids_generos[0]) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?php echo $lista_generos[1][$i] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="select_generos">Gênero:</label>
                    <div class="col-md-4">
                        <select id="select_generos" name="select_generos2" class="form-control">
                            <option value="">Vazio</option>
                            <?php
                            for ($i = 0; $i < count($lista_generos[0]); $i++) {
                                ?>
                                <option value="<?php echo $lista_generos[0][$i]  ?>" <?php if (isset($ids_generos)) {
                                                                                                if (sizeof($ids_generos)>=2) {
                                                                                                    if ($lista_generos[0][$i] == $ids_generos[1]) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                    
                                                                                                }
                                                                                            } ?>><?php echo $lista_generos[1][$i] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="select_generos">Gênero:</label>
                    <div class="col-md-4">
                        <select id="select_generos" name="select_generos3" class="form-control">
                            <option value="">Vazio</option>
                            <?php
                            for ($i = 0; $i < count($lista_generos[0]); $i++) {
                                ?>
                                <option value="<?php echo $lista_generos[0][$i]  ?>" <?php if (isset($ids_generos)) {
                                                                                                if (sizeof($ids_generos)>=3) {
                                                                                                    if ($lista_generos[0][$i] == $ids_generos[2]) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                    
                                                                                                }
                                                                                            } ?>><?php echo $lista_generos[1][$i] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <!-- _________________ Botão de add generos... provavel que tenha js ou algo do tipo ___________ -->
                <!-- <div class="form-group">
                    <label class="col-md-4 control-label" for="bt_ad_genero"></label>
                    <div class="col-md-4">
                        <div id="bt_ad_genero" name="bt_ad_genero" class="btn btn-primary">+</div>
                    </div>
                </div> -->

                <!-- Text input-->
                <!-- _________________ Caixas de novos autores... provavel que seja inserida via js ou algo do tipo ___________ -->
                <!-- <div class="form-group">
                    <label class="col-md-4 control-label" for="nv_genero">Novo gênero:</label>
                    <div class="col-md-4">
                        <input id="nv_genero" name="nv_genero" type="text" placeholder="" class="form-control input-md">
    
                    </div>
                </div> -->

                <!-- Button -->
                <!-- _________________ Botão de novos generos... provavel que tenha js ou algo do tipo ___________ -->
                <!-- <div class="form-group">
                    <label class="col-md-4 control-label" for="bt_ad_nv_genero"></label>
                    <div class="col-md-4">
                        <div id="bt_ad_nv_genero" name="bt_ad_nv_genero" class="btn btn-primary">+</div>
                    </div>
                </div> -->

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="qt_exemplar">Adicionar exemplares:</label>
                    <div class="col-md-4">
                        <input min="1" id="qt_exemplar" name="qt_exemplar" type="number" placeholder="" class="form-control input-md" >

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="bt_cadastrar"></label>
                    <div class="col-md-4">
                        <button id="bt_atualizar" name="bt_atualizar" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

</div>
<?php
$this->load->view('include/footer');
?>