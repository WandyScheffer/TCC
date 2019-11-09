<?php

$dados['title_do_header'] = 'Perfil';
$this->load->view('include/header', $dados);

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
                    <!--array-->
                    <th>Data entrega</th>
                    <!--array-->
                    <th>Multa</th>
                    <th>Ação</th>
                    <!--contar o que tem dentro da array -->
                </tr>
                <tr>
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
                </tr>
            </table>
        </div>
        <div><a href="">1 - 2 - 3</a></div>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>