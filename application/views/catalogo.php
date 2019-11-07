<?php

$dados['title_do_header'] = 'Catálogo';
$this->load->view('include/header', $dados);

?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<div class="disposicao">
    <div class="fundo_acervo">
        <fieldset>
            <legend>Pesquisar</legend>
            <form action="<?php echo base_url('pesquisa/p') ?>" method="post">
                <label for="caixaPesquisa">Caixa de pesquisa</label>
                <input type="text" name="caixaPesquisa" id="" value="<?php if (isset($caixaPesquisa)) {
                                                                            echo $caixaPesquisa;
                                                                        } ?>"><br>
                <label for="op">Pesquisar por:</label>
                <input type="radio" name="op" id="" value="1" <?php if (isset($op)) {
                                                                    if ($op == 1) {
                                                                        echo 'checked';
                                                                    }
                                                                } else {
                                                                    echo 'checked';
                                                                } ?>>Titulo
                <input type="radio" name="op" id="" value="2" <?php if (isset($op)) {
                                                                    if ($op == 2) {
                                                                        echo 'checked';
                                                                    }
                                                                }  ?>>Autor
                <input type="radio" name="op" id="" value="3" <?php if (isset($op)) {
                                                                    if ($op == 3) {
                                                                        echo 'checked';
                                                                    }
                                                                }  ?>>ISBN
                <br><input type="submit" value="Pesquisar" name="bt_pesquisa">
            </form>
        </fieldset>
    
        <fieldset>
            <legend>Filtro</legend>
            <form action="<?php echo base_url('filtro/p') ?>" method="post">
                <label for="selecao_autores">Autores:</label>
                <select name="selecao_autores" id="">
                    <option value="">Vazio</option>
                    <?php
                    for ($i = 0; $i < count($lista_autores[0]); $i++) {
                        ?>
                        <option value="<?php echo $lista_autores[0][$i]  ?>" <?php if (isset($autor)) {
                                                                                        if ($lista_autores[0][$i] == $autor) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>><?php echo $lista_autores[1][$i] ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="selecao_generos">Generos:</label>
                <select name="selecao_generos" id="">
                    <option value="">Vazio</option>
                    <?php
                    for ($i = 0; $i < count($lista_generos[0]); $i++) {
                        ?>
                        <option value="<?php echo $lista_generos[0][$i]  ?>" <?php if (isset($genero)) {
                                                                                        if ($lista_generos[0][$i] == $genero) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>><?php echo $lista_generos[1][$i] ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <!-- <label for="selecao_ordem">Ordenar por:</label> -->
                <!-- <select name="selecao_ordem" id="">
                    <option value="">Mais populares</option>
                    <option value="">Adquiridos recentemente</option>
                    <option value="">Alfabético</option>
                </select><br> -->
                <input type="submit" value="Filtrar" name="bt_filtro">
            </form>
        </fieldset>
        <div class="table-responsive-sm">
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
    
                <?php
                $chaves = array('{', '}');
                $vazio = true;
                foreach ($tabelaLivros as $row => $value) {
                    $vazio = false;
                    
                    ?>
                    <tr>
                        <td><a href="<?php echo base_url('pagina_livro/').$value['id_livro'] ?>"><?php echo $value['nm_titulo'] ?></a></td>
                        <td><?php echo (str_replace($chaves, '', $value['autores'])); ?></td>
                        <td><?php echo (str_replace($chaves, '', $value['generos'])); ?></td>
                        <td><?php print_r($value['cod_isbn']); ?></td>
                        <td><?php
                                $size = sizeof(explode(',', str_replace($chaves, '', $value['exemplares'])));
                                $liste = (explode(',', str_replace($chaves, '', $value['exemplares'])));
                                $cont_disponiveis = 0;
                                for ($i = 0; $i < $size; $i++) {
                                    if ($liste[$i] != '') {
                                        $cont_disponiveis++;
                                    }
                                }
                                echo $cont_disponiveis;
    
                                ?></td>
                    </tr>
                <?php }
                if ($vazio) { ?>
                    <tr>
                        <td colspan="5">Não foram encontrados resultados correspondentes</td>
                    </tr>
                <?php    }
                ?>
    
    
    
    
            </table>
        </div>
        <?php echo "<div style='display:flex; justify-content: center;'>".$paginacao."</div>"; ?>

    </div>
</div>

<?php

$this->load->view('include/footer');

?>