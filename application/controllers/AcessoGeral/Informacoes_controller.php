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
            "per_page" => 5, //limit por pagina
            "num_links" => 3,
            "uri_segment" =>3, //offset que vai ser pego da url
            "total_rows" => $this->infomo->nuLinhas(),
            "full_tag_open" => "<ul class = 'pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => false,
            "last_link" => false,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class = 'prev page-link'>",
            "prev_tag_close" => "<li>",
            "next_link" => "Próximo",
            "next_tag_open" => "<li class = 'next page-link'>",
            "next_tag_close" => "<li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class = 'active page-item'><span class = 'page-link'>",
            "cur_tag_close" => "<span class='sr-only'>(current)</span></span></li>",
            "num_tag_open" => "<li class = 'page-link'>",
            "num_tag_close" => "</li>"
        );

        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['objeventos']=$this->infomo->retornaTodoEvent($config['per_page'], $offset);

		$this->load->view('informacoes', $data);
	}
}
