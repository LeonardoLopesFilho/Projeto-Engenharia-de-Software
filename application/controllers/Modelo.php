<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller 
{
    public function index()
    {
        // 'listagem de alunos';
        $this->load->model('aluno_model'); // require Aluno_model

        // echo '<pre>';
        // print_r($arr);
        // echo '</pre>';

        $data['alunos'] = $this->aluno_model->listaAlunos();
        $this->load->view('lista_alunos', $data);
    }

    public function formInsere()
    {
        $data['tipo'] = 'insere';
        $data['acao'] = 'insereDb';
        $this->load->view('form_alunos', $data);
    }

    public function formAltera()
    {
        $id = $_GET['id'];

        $this->load->model('aluno_model'); // require Aluno_model
        $data['aluno'] = $this->aluno_model->listaAlunos($id);
        $data['tipo'] = 'altera';
        $data['acao'] = 'alteraDb';
        $this->load->view('form_alunos', $data);
    }

    public function insereDb()
    {
        $this->load->model('aluno_model'); // require Aluno_model
        $this->aluno_model->insere($_POST);
        $this->redireciona();
    }

    
    public function alteraDb()
    {
        $this->load->model('aluno_model'); // require Aluno_model
        $this->aluno_model->altera($_POST);
        $this->redireciona();
    }

    public function deletaDb()
    {
        $id = $_GET['id'];
        $this->load->model('aluno_model'); // require Aluno_model
        $this->aluno_model->exclui($id);
        $this->redireciona();
    }

    public function redireciona()
    {
        Header('Location: /Aluno/');
    }
}