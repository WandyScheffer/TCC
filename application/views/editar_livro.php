<?php
$dados['title_do_header'] = 'Editar livros';
$this->load->view('include/header', $dados);
?>
<div>
    <h1>N ta pronto ainda o edit</h1>
    <form class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend></legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nm_titulo">Título:</label>
                <div class="col-md-4">
                    <input id="nm_titulo" name="nm_titulo" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="select_autores">Autor(es):</label>
                <div class="col-md-4">
                    <select id="select_autores" name="select_autores" class="form-control">
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_ad_autores"></label>
                <div class="col-md-4">
                    <button id="bt_ad_autores" name="bt_ad_autores" class="btn btn-primary">+</button>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nv_autor">Novo autor:</label>
                <div class="col-md-4">
                    <input id="nv_autor" name="nv_autor" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_ad_nv_autor"></label>
                <div class="col-md-4">
                    <button id="bt_ad_nv_autor" name="bt_ad_nv_autor" class="btn btn-primary">+</button>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="isbn">ISBN:</label>
                <div class="col-md-4">
                    <input id="isbn" name="isbn" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="select_generos">Gênero(s):</label>
                <div class="col-md-4">
                    <select id="select_generos" name="select_generos" class="form-control">
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_ad_genero"></label>
                <div class="col-md-4">
                    <button id="bt_ad_genero" name="bt_ad_genero" class="btn btn-primary">+</button>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nv_genero">Novo gênero:</label>
                <div class="col-md-4">
                    <input id="nv_genero" name="nv_genero" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_ad_nv_genero"></label>
                <div class="col-md-4">
                    <button id="bt_ad_nv_genero" name="bt_ad_nv_genero" class="btn btn-primary">+</button>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="qt_exemplar">Quantia exemplar(es):</label>
                <div class="col-md-4">
                    <input id="qt_exemplar" name="qt_exemplar" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt_cadastrar"></label>
                <div class="col-md-4">
                    <button id="bt_cadastrar" name="bt_cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>

        </fieldset>
    </form>

</div>
<?php
$this->load->view('include/footer');
?>