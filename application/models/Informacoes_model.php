<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informacoes_model extends CI_Model
{

    function __construct(){
        parent::__construct();
    }
    
    public function retornaTodoEvent($limit, $offset){
        $sql = 'select id_is,
                        to_char(dt_publicacao,' ."'DD/MM/YYYY'". ') as dt_publicacao,
                        to_char(dt_prevista,' . "'DD/MM/YYYY'" . ') as dt_prevista,
                        titulo,
                        conteudo,
                        id_biblio,
                        tipo from "ALUNO4M21".mltb_infosite where tipo = 2 and dt_prevista > now() order by dt_prevista limit ? offset ?;';
        $query = $this->db->query($sql, array($limit,$offset));

        return $query->result();

        
    }

    public function nuLinhas(){
        $sql = 'select count(*) as nulinhas from "ALUNO4M21".mltb_infosite where tipo=2 and dt_prevista > now();';
        $query = $this->db->query($sql);

        return $query->row()->nulinhas;
    }

    
    
}
