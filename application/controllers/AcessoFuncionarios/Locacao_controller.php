<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locacao_controller extends CI_Controller
{
    // d1 //precisa da listagem tbm d2
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('locacoes');
    }
    public function lista()
    {
        echo 'até aqui chega';
    }
}
