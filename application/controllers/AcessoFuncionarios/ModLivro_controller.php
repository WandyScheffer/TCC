<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModLivro_controller extends CI_Controller
{
// d3
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('');
    }
}
