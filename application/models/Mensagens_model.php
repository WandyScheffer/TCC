<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagens_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        
    }

    public function verificaUser($id_user = null)
    {
        $this->db->where('id_pessoa = ', $id_user);
        $this->db->where('permissao', 3);

        return $this->db->get('"aluno4m21".mltb_pessoa', null, null)->result_array();
    }

    public function insereMensagem($array_insercao = null)
    {
        $this->db->insert('"aluno4m21".mltb_mensagens', $array_insercao);
        
    }

    public function retornaMensagensUser($id_user = null)
    {
        $sql = 'select me.id_envio, pe.nm_pessoa, me.nm_titulo, me.conteudo, me.id_msg
                from "aluno4m21".mltb_mensagens as me, "aluno4m21".mltb_pessoa as pe
                where me.id_envio = pe.id_pessoa and
                me.id_destino = ? and me.lida = false';

        $query = $this->db->query($sql, array($id_user));
        // $this->db->where('id_destino', $id_user);
        // $this->db->where('lida', false);

        // return $this->db->get('"aluno4m21".mltb_mensagens', null, null)->result_array();
        return $query->result_array();

    }

    public function vizualizaMensagem($id_msg = null)
    {
        $vizualizando['lida'] = true;
        $this->db->where('id_msg', $id_msg);
        $this->db->update('"aluno4m21".mltb_mensagens', $vizualizando);
        
    }
    
    public function retornaComment()
    {
        $sql = 'select co.id_locador, pe.nm_pessoa, li.nm_titulo as livro, co.nm_titulo, co.conteudo_coment, co.id_coment 
                from "aluno4m21".mltb_comentarios as co, "aluno4m21".mltb_pessoa as pe, "aluno4m21".mltb_livro as li
                where co.permissao is null and
                co.id_locador = pe.id_pessoa and
                li.id_livro = co.id_livro';

        $query = $this->db->query($sql)->result_array();

        return $query;
    }

    public function decisaoComent($array_update = null)
    {
        $this->db->where('id_coment', $array_update['id_coment']);
        $this->db->update('"aluno4m21".mltb_comentarios', $array_update);
        
        
    }

    public function retornaIdLivro($id_exemplar = null)
    {
        $this->db->select('id_livro');
        $this->db->where('id_exemplar', $id_exemplar);
        return $this->db->get('"aluno4m21".mltb_exemplar_livro', null, null)->result_array();
        
        
    }

    public function comentaLivro($array_insercao = null)
    {
        $this->db->insert('"aluno4m21".mltb_comentarios', $array_insercao);
        
    }

}

/* End of file Mensagens_model.php */
