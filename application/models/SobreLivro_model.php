<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SobreLivro_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function retornaInfoLivro($id)
    {
        $sql = 'select li.id_livro,
                li.nm_titulo, 
                array(
                	select a.nm_autor from "aluno4m21".mltb_autor a, "aluno4m21".mltb_livro_autor la 
                	where la.id_livro = li.id_livro and la.id_autor = a.id_autor
                ) as autores,
                array(
                	select g.tipo from "aluno4m21".mltb_genero g, "aluno4m21".mltb_livro_genero lg 
                	where lg.id_livro = li.id_livro and g.id_genero = lg.id_genero
                ) as generos,
                array(
                	select e.id_exemplar from "aluno4m21".mltb_exemplar_livro e 
                	where e.id_livro = li.id_livro
                )  as exemplares,
                li.cod_isbn
                from "aluno4m21".mltb_livro li
                where id_livro = ?;';

        $query = $this->db->query($sql, array($id));
        return $query->result_array();
    }
    
    public function retornaComentLivro($limit = null, $offset = null, $id_livro = null)
    {
        $this->db->where('id_livro =', $id_livro);
        $this->db->where('permissao =', true);

        return $this->db->get('"aluno4m21".mltb_comentarios', $limit, $offset)->result_array();
        
    }

}

/* End of file SobreLivro_model.php */
