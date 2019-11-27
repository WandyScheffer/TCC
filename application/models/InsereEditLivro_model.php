<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class InsereEditLivro_model extends CI_Model {

    
    public function __construct(){
        parent::__construct();
    }

    public function insereLivro($array_insercao = null){

        return $this->db->insert('"aluno4m21".mltb_livro', $array_insercao);

    }
    
    public function ultimoInserido()//retorna o id do ultimo livro para inserir as relações
    {
        
        $this->db->select('id_livro');

        $this->db->order_by('id_livro', 'desc');

        return $this->db->get('"aluno4m21".mltb_livro', 1, 0)->result_array();
        
    }

    public function relacaoAutor($array_autores = null, $livro = null)
    {
        $array_insercao['id_livro'] = $livro;
        $qt_autores = sizeof($array_autores);
        
        for ($i=1; $i <= $qt_autores; $i++) { 
            $conca_autor_ind = "id_autor_".$i;
            if (!isset($array_autores[$conca_autor_ind])) {
                $i2 = $i + 1;
                $conca_autor_ind = "id_autor_" . $i2;
            }
            $array_insercao['id_autor'] = $array_autores[$conca_autor_ind];
            $this->db->insert('"aluno4m21".mltb_livro_autor', $array_insercao);
        }
        

    }

    public function relacaoGenero($array_generos = null, $livro = null)
    {

        $array_insercao['id_livro'] = $livro;
        $qt_generos = sizeof($array_generos);

        for ($i = 1; $i <= $qt_generos; $i++) {
            $conca_genero_ind = "id_genero_" . $i;
            if (!isset($array_generos[$conca_genero_ind])) {
                $i2 = $i + 1;
                $conca_genero_ind = "id_genero_" . $i2;
            }
            $array_insercao['id_genero'] = $array_generos[$conca_genero_ind];
            $this->db->insert('"aluno4m21".mltb_livro_genero', $array_insercao);
        }

    }

    public function relacaoExemplares($qt_exemplares = null, $livro = null)
    {
        $array_insercao['id_livro'] = $livro;
        for ($i=0; $i < $qt_exemplares; $i++) { 
            
            $this->db->insert('"aluno4m21".mltb_exemplar_livro', $array_insercao);
            
        }
    }

    public function addAutor($nm_autor = null)
    {
        $this->db->insert('"aluno4m21".mltb_autor', $nm_autor);
        
    }
    public function addGenero($nm_genero = null)
    {
        $this->db->insert('"aluno4m21".mltb_genero', $nm_genero);
    }

    public function retornoEdit($id = null)
    {
        $sql = 'select li.id_livro,
                li.nm_titulo, 
                array(
                	select a.id_autor from "aluno4m21".mltb_autor a, "aluno4m21".mltb_livro_autor la 
                	where la.id_livro = li.id_livro and la.id_autor = a.id_autor
                ) as autores,
                array(
                	select g.id_genero from "aluno4m21".mltb_genero g, "aluno4m21".mltb_livro_genero lg 
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

    public function editLivro($array_update = null, $id_livro = null)
    {
        $this->db->where('id_livro =', $id_livro);
        
        $this->db->update('"aluno4m21".mltb_livro', $array_update);    
    }

    public function editLivroAutor($array_autores = null, $id_livro = null)
    {
        $this->db->where('id_livro =', $id_livro);
        
        $this->db->delete('"aluno4m21".mltb_livro_autor');
        

        $array_insercao['id_livro'] = $id_livro;
        $qt_autores = sizeof($array_autores);

        for ($i = 1; $i <= $qt_autores; $i++) {
            $conca_autor_ind = "id_autor_" . $i;
            if (!isset($array_autores[$conca_autor_ind])) {
                $i2 = $i + 1;
                $conca_autor_ind = "id_autor_" . $i2;
            }
            $array_insercao['id_autor'] = $array_autores[$conca_autor_ind];
            $this->db->insert('"aluno4m21".mltb_livro_autor', $array_insercao);
        }
        
        
    }

    public function editLivroGenero($array_generos = null, $id_livro = null)
    {
        $this->db->where('id_livro =', $id_livro);

        $this->db->delete('"aluno4m21".mltb_livro_genero');


        $array_insercao['id_livro'] = $id_livro;
        $qt_generos = sizeof($array_generos);

        for ($i = 1; $i <= $qt_generos; $i++) {
            $conca_gener_ind = "id_genero_" . $i;
            if (!isset($array_generos[$conca_gener_ind])) {
                $i2 = $i + 1;
                $conca_gener_ind = "id_genero_" . $i2;
            }
            $array_insercao['id_genero'] = $array_generos[$conca_gener_ind];
            $this->db->insert('"aluno4m21".mltb_livro_genero', $array_insercao);
        }
    }

    public function addExemplares($qt_novos_exemplares = null, $id_livro = null)
    {
        $array_insercao['id_livro'] = $id_livro;
        for ($i = 0; $i < $qt_novos_exemplares; $i++) {
            $this->db->insert('"aluno4m21".mltb_exemplar_livro', $array_insercao);
        }
    }


}

/* End of file InsereEditLivro_model.php */
