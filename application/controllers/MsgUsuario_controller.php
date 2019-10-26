<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MsgUsuario_controller extends CI_Controller
{
    // d2
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('mensagens_usuario');
    }
}
