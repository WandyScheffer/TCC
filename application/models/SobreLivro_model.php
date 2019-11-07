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
                	select a.nm_autor from "ALUNO4M21".mltb_autor a, "ALUNO4M21".mltb_livro_autor la 
                	where la.id_livro = li.id_livro and la.id_autor = a.id_autor
                ) as autores,
                array(
                	select g.tipo from "ALUNO4M21".mltb_genero g, "ALUNO4M21".mltb_livro_genero lg 
                	where lg.id_livro = li.id_livro and g.id_genero = lg.id_genero
                ) as generos,
                array(
                	select e.id_exemplar from "ALUNO4M21".mltb_exemplar_livro e 
                	where e.id_livro = li.id_livro
                )  as exemplares,
                li.cod_isbn
                from "ALUNO4M21".mltb_livro li
                where id_livro = ?;';

        $query = $this->db->query($sql, array($id));
        return $query->result_array();
    }
    
    

}

/* End of file SobreLivro_model.php */
