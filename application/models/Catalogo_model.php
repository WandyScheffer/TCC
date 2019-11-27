<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogo_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    //retorna livros para a tabela, em ordem alfabética
    public function retornoLivroAlfa($limit, $offset){
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
                	where e.id_livro = li.id_livro and e.est_locado = false
                )  as exemplares,
                li.cod_isbn
                from "aluno4m21".mltb_livro li
                order by nm_titulo limit ? offset ?;';
        
        $query = $this->db->query($sql, array($limit, $offset));
        return $query->result_array();
        
    }
    public function nuLinhas($tipo_selecao = null, $demais = null){
        if ($tipo_selecao==1) {//linhas da ordem alfabética
            $sql = 'select count(nm_titulo) as nulinhas from "aluno4m21".mltb_livro;';
            $query = $this->db->query($sql);
            return $query->row()->nulinhas;
        } else if ($tipo_selecao==2){
            
        }
    }

    //retorna autores para caixa de seleção
    public function retornoAutores(){
        $sql = 'select * from "aluno4m21".mltb_autor;';
        $query=$this->db->query($sql);
        $lista_id = [];
        $lista_autores = [];
        $listas = [];

        foreach ($query->result() as $row) {
            $lista_id[] = $row->id_autor;
            $lista_autores[] = $row->nm_autor;
        }

        $listas[] = $lista_id;
        $listas[] = $lista_autores;
        return $listas;
    }

    public function retornoGeneros(){
        $sql = 'select * from "aluno4m21".mltb_genero;';
        $query = $this->db->query($sql);
        $lista_id = [];
        $lista_generos = [];
        $listas = [];

        foreach ($query->result() as $row) {
            $lista_id[] = $row->id_genero;
            $lista_generos[] = $row->tipo;
        }

        $listas[] = $lista_id;
        $listas[] = $lista_generos;
        return $listas;
    }

    public function retornoLike($tipo, $string, $limit, $offset)
    {//faz seleção like pelo titulo
        if ($tipo == 1) {
            $string = "'%" . $string . "%'";
            $sql = "select li.id_livro,
                li.nm_titulo, 
                array(
                	select a.nm_autor from " . '"aluno4m21"' . ".mltb_autor a, " . '"aluno4m21"' . ".mltb_livro_autor la 
                	where la.id_livro = li.id_livro and la.id_autor = a.id_autor
                ) as autores,
                array(
                	select g.tipo from " . '"aluno4m21"' . ".mltb_genero g, " . '"aluno4m21"' . ".mltb_livro_genero lg 
                	where lg.id_livro = li.id_livro and g.id_genero = lg.id_genero
                ) as generos,
                array(
                	select e.id_exemplar from " . '"aluno4m21"' . ".mltb_exemplar_livro e 
                	where e.id_livro = li.id_livro and e.est_locado = false
                )  as exemplares,
                li.cod_isbn
                from " . '"aluno4m21"' . ".mltb_livro li
                where nm_titulo like" . $string .
                "order by nm_titulo limit ? offset ?;";

            $query = $this->db->query($sql, array($limit, $offset));
            return $query->result_array();

        }else if ($tipo == 2){
            $string = "'%" . $string . "%'";

            $sql = "select li.id_livro,
                li.nm_titulo, 
                array(
                	select a.nm_autor from " . '"aluno4m21"' . ".mltb_autor a, " . '"aluno4m21"' . ".mltb_livro_autor la 
                	where la.id_livro = li.id_livro and la.id_autor = a.id_autor
                ) as autores,
                array(
                	select g.tipo from " . '"aluno4m21"' . ".mltb_genero g, " . '"aluno4m21"' . ".mltb_livro_genero lg 
                	where lg.id_livro = li.id_livro and g.id_genero = lg.id_genero
                ) as generos,
                array(
                	select e.id_exemplar from " . '"aluno4m21"' . ".mltb_exemplar_livro e 
                	where e.id_livro = li.id_livro and e.est_locado = false
                )  as exemplares,
                li.cod_isbn
                from " . '"aluno4m21"' . ".mltb_livro li, " . '"aluno4m21"' . ".mltb_autor a, " . '"aluno4m21"' . ".mltb_livro_autor la
                where a.nm_autor like" . $string .
                "and la . id_autor = a . id_autor and la . id_livro = li . id_livro
                order by nm_titulo limit ? offset ?;";


            $query = $this->db->query($sql, array($limit, $offset));
            return $query->result_array();

        }else if($tipo == 3){
            $string = "'" . $string . "'";
            $sql = "select li.id_livro,
                li.nm_titulo, 
                array(
                	select a.nm_autor from " . '"aluno4m21"' . ".mltb_autor a, " . '"aluno4m21"' . ".mltb_livro_autor la 
                	where la.id_livro = li.id_livro and la.id_autor = a.id_autor
                ) as autores,
                array(
                	select g.tipo from " . '"aluno4m21"' . ".mltb_genero g, " . '"aluno4m21"' . ".mltb_livro_genero lg 
                	where lg.id_livro = li.id_livro and g.id_genero = lg.id_genero
                ) as generos,
                array(
                	select e.id_exemplar from " . '"aluno4m21"' . ".mltb_exemplar_livro e 
                	where e.id_livro = li.id_livro and e.est_locado = false
                )  as exemplares,
                li.cod_isbn
                from " . '"aluno4m21"' . ".mltb_livro li
                where li.cod_isbn =" . $string .
                "order by nm_titulo limit ? offset ?;";               

            $query = $this->db->query($sql, array($limit, $offset));
            return $query->result_array();
        }
        
    }
    public function filtro($array, $limit, $offset){

        if (isset($array['autor']) && isset($array['genero'])) {
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
                from "aluno4m21".mltb_livro li, 
                "aluno4m21".mltb_autor a, 
                "aluno4m21".mltb_livro_autor la, 
                "aluno4m21".mltb_genero g,
                "aluno4m21".mltb_livro_genero lg 

                where li.id_livro = la.id_livro and
                la.id_autor = ? and
                a.id_autor = ? and
                li.id_livro = lg.id_livro and
                lg.id_genero = ? and
                g.id_genero = ? 
                order by nm_titulo limit ? offset ?;';

            $query = $this->db->query($sql, array($array['autor'], $array['autor'], $array['genero'], $array['genero'], $limit, $offset));
            
        } else if(isset($array['autor'])){
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
                from "aluno4m21".mltb_livro li, 
                "aluno4m21".mltb_autor a,
                "aluno4m21".mltb_livro_autor la

                where li.id_livro = la.id_livro and
                la.id_autor = ? and
                a.id_autor = ? 
                order by nm_titulo limit ? offset ?';

            $query = $this->db->query($sql, array($array['autor'], $array['autor'], $limit, $offset));

        } else if(isset($array['genero'])){
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
                from "aluno4m21".mltb_livro li, 
                "aluno4m21".mltb_genero g,
                "aluno4m21".mltb_livro_genero lg

                where li.id_livro = lg.id_livro and
                lg.id_genero = ? and
                g.id_genero = ?
                order by nm_titulo limit ? offset ?;';

            $query = $this->db->query($sql, array($array['genero'], $array['genero'], $limit, $offset));
            

        }
        return $query->result_array();


    }

    
}
