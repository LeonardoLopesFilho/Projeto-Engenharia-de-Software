<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function index()
    {
        $this->load->view('form_login');
    }

    public function autenticar()
    {
        $this->load->model('usuario_model');
        $username =$_POST['username'];
        $usuario = $this->usuario_model->logarUsuarios($username);
        if ($usuario->num_rows()==1) {
            header('location:/usuario');
        }else {
            $this->session->set_flashdata('danger', 'Usuario,senha ou email invalidos !');
            header('location:/login');
        }
    }
}