<?php

$dados['title_do_header'] = 'Extras';
$this->load->view('include/header', $dados);

?>

<div class="disposicao">
    <div class="fundo_referente">
       

        <form action="<?php 
        if ($tipo==1) {
            echo base_url('cadastrando_referente/1');
        } else {
            echo base_url('cadastrando_referente/2');
        }
        
        ?>" method="post">
        
            
            <div class="form-group">
                <label for=""><?php if ($tipo==1) {
                    echo "Novo autor: ";
                }else{
                    echo "Novo gênero: ";
                } ?></label>
                <input class="form-control-referente" type="text" name="dado_referente" id="" required>
            </div>
           
            <div class="form-group btn_referente">

                <button id="singlebutton" name="btn_referente" class="btn btn-primary">Cadastrar</button>

            </div>



           

        </form>
    </div>
</div>

<?php

$this->load->view('include/footer');

?>