<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CadConteudo_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function novaMulta($valor, $id)
    {    

        $sql = 'insert into "ALUNO4M21".mltb_valormulta values (default, ?, now(), ?)';
        $exec = $this->db->query($sql, array($valor,$id));
        return $exec;   

    }
    public function valorMulta()
    {

        $sql = 'select vl_multa from "ALUNO4M21".mltb_valormulta order by id_valor desc limit 1';
        $exec = $this->db->query($sql)->row()->vl_multa;
        return $exec;

    }
    public function ultimoSobre()
    {
        $this->db->where('tipo', 1);
        $this->db->order_by('id_is', 'desc');
        $result = $this->db->get('"ALUNO4M21".mltb_infosite', 1);
        $dados = [];

        foreach ($result->result() as $row) {
            $dados['titulo'] = $row->titulo;
            $dados['conteudo'] = $row->conteudo;
        }

        return $dados;
        
    }
    public function novoSobre($dados)
    {
        $this->db->insert('"ALUNO4M21".mltb_infosite', $dados);
        
    }

    public function cadNoticia($dados)
    {
        $this->db->insert('"ALUNO4M21".mltb_infosite', $dados);
        
    }

}
