<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controle extends CI_Controller 
{
    public function index()
    {
        $this->load->view('home'); // require Aluno_model
    }

    public function gerenciamento()
    {
        $this->load->view('form_login'); 
    }

    public function vendas()
    {
        // Implementar funcionalidade de $_SESSION; 
        $this->load->view('formLoginSistema'); 
    }

    public function atendimento()
    {
        $this->load->model('usuario_model'); 
        $data['usuario'] = $this->usuario_model->getUsuarios($_GET['user']); 
        $this->load->view('atendimento'); 
    }

    public function pedido()
    {
        $this->load->view('formPedido'); 
    }

    public function cliente()
    {
        $this->load->view('formCliente'); 
    }

    public function listaPedido()
    {
        $this->load->view('listaPedido'); 
    }

    public function listaProduto()
    {
        $this->load->model('produto_model');
        $produtos= $this->produto_model->listaProduto();  
        $data['produtos'] =  $produtos;
        $this->load->view('listaProduto', $data); 
    }
    public function excluiregistro()
    {
        $id =$_GET['id'] ?? '';
        $username = $_GET['username'] ?? ''; 
        $this->load->model('produto_model');
        $this->produto_model->deleta($id);
        header("location:/controle/listaProduto?user={$username}");//retorna pra o index
    }

    public function produto()
    {   
        $this->load->view('formProduto'); 
    }

    public function sair()
    {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']); 
            header('Location: /controle/vendas');
        }
    }
    // Autentica login do gerenciamento de usuarios
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

    // Autentica login do sistema de vendas
    public function autenticarVendas()
    {
        $this->load->model('usuario_model'); 
        $username = $_POST['username']; 
        $password = $_POST['senha']; 
        $usuario = $this->usuario_model->loginVendas($username, $password); 
        if ( ($usuario->num_rows() == 1) ) {
            $this->load->model('usuario_model'); 
            $dados = $this->usuario_model->getUsuarios($username); 
            header("location:/controle/atendimento?user=$username"); 
        }else {
            header('location:/controle/vendas?errno=0'); 
        }
    }

    public function autenticaCliente()
    {
        $this->load->model('cliente_model'); 
        $cpf = $_POST['cpf']; 
        $rg = $_POST['rg']; 
        $nascimento = $_POST['data_nascimento']; 
        $username = $_POST['username']; 
        if ( $this->cliente_model->getCliente($cpf,$rg) ) {
            // Retornou resultado, portanto ja existe no banco de dados
            header("location:/controle/cliente?user={$username}&return=0"); 
        }else {
            if (strlen($cpf)!=11) {
                // CPF nao tem 11 digitos, portanto é invalido
                header("location:/controle/cliente?user={$username}&return=1"); 
            } else {
                // Encaminha com mensagem de sucesso
                $this->load->model('cliente_model'); 
                $this->cliente_model->insere($_POST); 
                header("location:/controle/cliente?user={$username}&return=51"); 
                // echo "<pre>";
                // print_r($cliente); 
                // echo "</pre>";

            }
            // FAZER VALIDACAO DE IDADE
            // header('location:/controle/vendas?errno=0'); 
        }
    }
    
    public function autenticaProduto()
    {
        $this->load->model('produto_model'); 
        $codBarras = $_POST['cod_barras']; 
        $validade = $_POST['data_validade']; 
        $username = $_POST['username']; 
        if ( $this->produto_model->getProduto($codBarras) ) {
            // Retornou resultado, portanto ja existe no banco de dados
            header("location:/controle/produto?user={$username}&return=0"); 
        }else {
            
            // Encaminha com mensagem de sucesso
            $this->load->model('produto_model'); 
            $this->produto_model->insere($_POST); 
            header("location:/controle/produto?user={$username}&return=51"); 
            // echo "<pre>";
            // print_r($cliente); 
            // echo "</pre>";
            // FAZER VALIDACAO DE IDADE
            // header('location:/controle/vendas?errno=0'); 
        }
    }

    public function formInsere()
    {
        $data['tipo'] = 'insere';
        $data['acao'] = 'insereDb';
        $this->load->view('form_alunos', $data); 
    }

    public function AlteraProduto()
    {
        $id = $_GET['id'];

        $this->load->model('produto_model');
        $data['produto'] = $this->produto_model->listaProduto($id);
        $data['tipo'] = 'altera';
        $data['acao'] = 'alteradb';
        $this->load->view('listaProduto', $data);
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
