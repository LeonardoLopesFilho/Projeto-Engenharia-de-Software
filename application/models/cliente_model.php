<?php
/**
 * este arquivo é responsavel por conversar com o banco de dados
 */
class cliente_model extends CI_Model
{
    public function listaCliente($id = false)
    {
        if ($id) {
            return $this->db->get_where('cliente', ['id_cliente' => $id])->result(); 
        }
        // select * from alunos
        return $this->db->get('cliente')->result();
    }

    public function getCliente( $cpf , $rg = false )
    {
        if ($rg) {
            $cliente = $this->db->get_where('cliente', ['cpf' => $cpf, 'rg' => $rg])->result(); 
            return $cliente; 
        }
        $cliente = $this->db->get_where('cliente', ['cpf' => $cpf])->result(); 
        return $cliente; 
    }

    public function insere($data)
    {
        return $this->db->insert('cliente', $data);
    }

    public function altera($data)
    {
        $id =$data['id_usuario'];
        return $this->db->update('usuario',$data, "id_usuario = $id");
    }

}