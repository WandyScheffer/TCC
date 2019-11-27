<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sobre_model extends CI_Model{



    function __construct(){
        parent::__construct();
    }

    public function retornoSobre(){
        $sql = 'select titulo, conteudo from "aluno4m21".mltb_infosite where tipo = 1 order by id_is desc limit 1;';
        $query = $this->db->query($sql);
        //$lista_titulo = [];
        //$lista_conteudo = [];
        $lista = [];

        foreach ($query->result() as $row) {
            $lista['titulo'] = $row->titulo;
            $lista['conteudo'] = $row->conteudo;
        }
        
        return $lista;
            
    }
}
