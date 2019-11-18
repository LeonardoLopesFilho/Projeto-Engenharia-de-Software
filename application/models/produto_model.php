<?php
/**
 * este arquivo é responsavel por conversar com o banco de dados
 * Arquivo referente a toda manipulação de dados de "Produto"
 */
class produto_model extends CI_Model
{
    public function listaProduto($id = false)
    {
        if ($id) {
            return $this->db->get_where('produto', ['id_produto' => $id])->result(); 
        }
        // select * from alunos
        return $this->db->get('produto')->result();
    }

    public function getProduto( $codBarras )
    {
        $produto = $this->db->get_where('produto', ['cod_barras' => $codBarras])->result(); 
        return $produto; 
    }

    public function insere($data)
    {
        return $this->db->insert('produto', $data);
    }

    public function altera($data)
    {
        $id =$data['id_usuario'];
        return $this->db->update('usuario',$data, "id_usuario = $id");
    }

    public function deleta($id)
    {
        return $this->db->delete('produto', ['id_produto' => $id]);
    }

    // Username esperado no parametro é um array associativo
    public function loginVendas( $username, $password )
    {
        $user = $this->db->get_where('usuario', ['username' => $username, 'senha' => $password]); 
        return $user; 

    }

    public function logarUsuarios($username)
    {
        $usuario = $this->db->get_where('usuario', ['username' => $username]);
        $senha = $this->db->get_where('usuario', ['senha' => $senha]);
        $email = $this->db->get_where('usuario', ['email' => $email]);
        return $usuario;
         
    }
}