<?php
/**
 * este arquivo é responsavel por conversar com o banco de dados
 */
class usuario_model extends CI_Model
{
    public function listaUsuarios($id = false)
    {
        if ($id) {
            return $this->db->get_where('usuario', ['id_usuario' => $id])->result(); 
        }
        // select * from alunos
        return $this->db->get('usuario')->result();
    }

    public function getUsuarios( $username = false )
    {
        $user = $this->db->get_where('usuario', ['username' => $username])->result(); 
        return $user; 
    }

    public function insere($data)
    {
        return $this->db->insert('usuario', $data);
    }

    public function altera($data)
    {
        $id =$data['id_usuario'];
        return $this->db->update('usuario',$data, "id_usuario = $id");
    }

    public function deleta($id)
    {
        return $this->db->delete('usuario', ['id_usuario' => $id]);
    }

    // Username esperado no parametro é um array associativo
    public function loginVendas( $username, $password )
    {
        $user = $this->db->get_where('usuario', ['username' => $username, 'senha' => $password]); 
        return $user; 

    }

    public function logarUsuarios($username,$senha,$email)
    {
        $usuario = $this->db->get_where('usuario', ['username' => $username, 'senha' => $senha, 'email' => $email]);

        return $usuario;

         
    }
}
