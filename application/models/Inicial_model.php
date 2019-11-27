<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicial_model extends CI_Model{



    function __construct(){
        parent::__construct();
    }

    public function retornoEvent(){
        $sql = 'select titulo, conteudo from "aluno4m21".mltb_infosite where tipo = 2 order by id_is desc limit 8;';
        $query = $this->db->query($sql);
        $lista_titulo = [];
        $lista_conteudo = [];
        $listas = [];

        foreach ($query->result() as $row) {
            $lista_titulo[] = $row->titulo;
            $lista_conteudo[] = $row->conteudo;
        }
        
        $listas[] = $lista_titulo;
        $listas[] = $lista_conteudo;
        return $listas;
        
        
    }
}
