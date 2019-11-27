<?php   

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function insereUser($array_insercao)
    {

        return $this->db->insert('"aluno4m21".mltb_pessoa', $array_insercao);
        
    }
    
    public function retornaUsers($limit = null, $offset = null, $array = null)
    {
        if ($array == null) {
            $this->db->select('id_pessoa, nm_pessoa, nu_telefone, email, permissao');
            
            $this->db->order_by('id_pessoa', 'asc');
            
            return $this->db->get('"aluno4m21".mltb_pessoa', $limit, $offset)->result_array();
            
        }else {
            if (isset($array['tp_user'])) {
                $this->db->where('permissao', $array['tp_user']);
            }
            
            $this->db->like('nm_pessoa', $array['nm_pessoa']);

            $this->db->select('id_pessoa, nm_pessoa, nu_telefone, email, permissao');

            $this->db->order_by('id_pessoa', 'asc');

            return $this->db->get('"aluno4m21".mltb_pessoa', $limit, $offset)->result_array();
        }
    }
    public function retornaUserUni($id = null)
    {
        $this->db->where('id_pessoa', $id);

        return $this->db->get('"aluno4m21".mltb_pessoa', 1, 0)->result_array();
        
        
    }
    public function updateUser($array_update, $id_where)
    {
        $this->db->where('id_pessoa', $id_where);
        
        $this->db->update('"aluno4m21".mltb_pessoa', $array_update);
        
    }

}

/* End of file Usuarios_model.php */
