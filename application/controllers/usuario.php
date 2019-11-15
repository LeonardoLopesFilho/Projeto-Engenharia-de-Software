<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * é arquivo que permite entradas do navegador
 */
class usuario extends CI_Controller 
{
    public function index()
    {
       $this->load->model('usuario_model');
       $usuarios = $this->usuario_model->listaUsuarios();
          //echo '<pre>';     
        // print_r($usuarios);
         // echo '</pre>';     
       
        $data['usuarios'] =  $usuarios;
        $this->load->view('lista_usuario', $data);
    }

    public function form_usuario()
    {
        $tipo =$_GET['tipo'] ?? '';
        //inserção
        if ($tipo == 1){
            $data['tipo'] = $tipo;
            $this->load->view('form_usuario',$data);
        } else {
            $id = $_GET['id'] ?? null;
            $this->load->model('usuario_model');
            $usuario = $this->usuario_model->listaUsuarios($id);
            $data['usuario'] = $usuario;
            $data['tipo'] =$tipo;
            $this->load->view('form_usuario',$data);

        }
    }

    public function recebePost()
    {
        $tipo =$_GET['tipo'] ?? '';
        if($tipo == 1){
            $this->load->model('usuario_model');
            if ($_POST['senha'] == '') {
                $this->session->set_flashdata('danger', 'Digite uma senha!');
                header('location:/usuario/form_usuario?tipo=1');
            }else if ($_POST['username'] =='') {
                $this->session->set_flashdata('danger', 'Digite um Username!');
                header('location:/usuario/form_usuario?tipo=1');
            }else if ($_POST['cpf'] =='') {
                $this->session->set_flashdata('danger', 'Digite um CPF!');
                header('location:/usuario/form_usuario?tipo=1');
            }else if ($_POST['email'] =='') {
                $this->session->set_flashdata('danger', 'Digite um Email!');
                header('location:/usuario/form_usuario?tipo=1');
            }else if ($_POST['nivel_acesso'] =='') {
                $this->session->set_flashdata('danger', 'Digite um Nivel de acesso!');
                header('location:/usuario/form_usuario?tipo=1');
            }else if ($_POST['documento'] =='') {
                $this->session->set_flashdata('danger', 'Digite um Numero de Documento!');
                header('location:/usuario/form_usuario?tipo=1');
            }else {            
            $this->usuario_model->insere($_POST);
            header('location: /login');//retorna pra o index
            }
        }else{
            $this->load->model('usuario_model');
            $this->usuario_model->altera($_POST);
            header('Location: /usuario');// retorna para index
        }
    }

    public function excluiregistro()
    {
        $id =$_GET['id'] ?? '';
        $this->load->model('usuario_model');
        $this->usuario_model->deleta($id);
        header('location: /usuario');//retorna pra o index
    }

}