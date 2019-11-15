<?php

class Aluno_model extends CI_Model
{

    public function listaAlunos($id = false)
    {
        if ($id) {
            return $this->db->get_where('alunos', ['id' => $id])->result();    
        }
        // select * from alunos
        return $this->db->get('alunos')->result();
    }

    public function insere(Array $data)
    {
        return $this->db->insert('alunos', $data);
    }

    public function altera(Array $data)
    {
        return $this->db->update('alunos', $data, ['id' => $data['id']]);
    }

    public function exclui($id)
    {
        return $this->db->delete('alunos', ['id' => $id]);
    }
}