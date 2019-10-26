<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacoes_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

	public function index(){
        $this->load->model('informacoes_model', 'infomo');

        $config = array(
            "base_url" => base_url('informacoes/p'),
            "per_page" => 3, //limit por pagina
            "num_links" => 3,
            "uri_segment" =>3, //offset que vai ser pego da url
            "total_rows" => $this->infomo->nuLinhas()
        );

        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['objeventos']=$this->infomo->retornaTodoEvent($config['per_page'], $offset);

		$this->load->view('informacoes', $data);
	}
}
