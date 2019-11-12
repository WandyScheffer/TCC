<?php

$dados['title_do_header'] = 'Perfil';
$this->load->view('include/header', $dados);
// date_default_timezone_set('America/Sao_Paulo');

// $atual = new DateTime();

// // print_r($atual->format('d/m/Y'));

// $a = ($atual->format('d/m/Y'));

// // print_r(strtotime(($tabelaLocacoesUser[0]['dt_locacao'])) - strtotime($a)  );

// $teste = (strtotime(($tabelaLocacoesUser[0]['dt_locacao'])) - strtotime($a));

// print_r(times);
?>

<div class="disposicao">
    <div class="fundo_locador table-responsive">
        <div class="superior_locador">
            <div class="ladoA">
                <span>Nome: <?php echo $user['nm_pessoa']; ?></span>
                <span>CPF: <?php echo $user['nu_cpf']; ?></span>
                <span>Telefone: <?php echo $user['nu_telefone']; ?></span>
                <span>Email: <?php echo $user['email']; ?></span>
            </div>
            <div class="ladoB">
                <span>CEP: <?php echo $user['cep']; ?></span>
                <span>Número: <?php echo $user['nu_endereco']; ?></span>
                <span>Complemento: <?php echo $user['complemento']; ?></span>
            </div>
        </div>
        <div class="inferior_locador">
            <table class="table table-bordered table-striped table-light">
                <tr>
                    <th>ID exemplar</th>
                    <th>Titulo</th>
                    <th>Data entrega prevista</th>
                    <th>Data entrega</th>
                    <th>Valor pago</th>
                    <th>Multa</th>
                    <th>Ação</th>
                </tr>
                <?php foreach ($tabelaLocacoesUser as $linha) { ?>
                    <tr>
                        <td><?php print_r($linha['id_exemplar']) ?></td>
                        <td><?php print_r($linha['titulo']) ?></td>
                        <td><?php print_r($linha['dt_devolucao_prevista']) ?></td>
                        <td><?php print_r($linha['dt_devolucao']) ?></td>
                        <td><?php print_r($linha['vl_pago']) ?></td>
                        <td><?php if ($linha['multa'] < 0) {
                                    print_r('0');
                                } else {
                                    print_r($linha['multa']);
                                } ?></td>
                        <td><?php if ($linha['multa'] == 0 && $linha['dt_devolucao'] == '') { ?>

                                <a href="<?php echo base_url('renovar/').$linha['id_locacao'] ?>" class="btn btn-outline-danger">Renovar</a>

                            <?php } elseif ($linha['dt_devolucao'] != '') { ?>

                                <a href="<?php echo base_url('mensagens') ?>" class="btn btn-outline-primary">Comentar</a>

                            <?php } ?></td>
                        <!-- <td><?php //print_r($linha['']) 
                                        ?></td> -->
                    </tr>
                <?php } ?>
                <!-- <tr>
                    <td>11</td>
                    <td>LIVROD1</td>
                    <td>2019-10-01</td>
                    <td>1,00</td>
                    <td><a href="" class="btn btn-outline-danger">Renovar</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>LIVROA1</td>
                    <td>2019-09-05</td>
                    <td>0</td>
                    <td><a href="" class="btn btn-outline-primary">Comentar</a></td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>LIVROB2</td>
                    <td>2019-08-09</td>
                    <td>2,00</td>
                    <td><a href="" class="btn btn-outline-info">Ver comentário</a></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>LIVROB1</td>
                    <td>2019-07-15</td>
                    <td>1,00</td>
                    <td><a href="" class="btn btn-outline-info">Ver comentário</a></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>LIVROD2</td>
                    <td>2019-05-28</td>
                    <td>0,75</td>
                    <td><a href="" class="btn btn-outline-info">Ver comentário</a></td>
                </tr> -->
            </table>
        </div>
        <div><?php echo $paginacao ?></div>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>