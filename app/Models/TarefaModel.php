<?php

namespace App\Models;

use CodeIgniter\Model;

class TarefaModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'tarefas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'descricao',
        'situacao_registro',
        'fk_categoria',
        'fk_responsavel',
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getJoinRegistro() {
        $result = $this->db->query(
                "SELECT t.*, c.nome AS 'categoria', r.nome AS 'responsavel' FROM tarefas AS t 
                INNER JOIN categorias AS c ON t.fk_categoria = c.id 
                INNER JOIN responsaveis AS r ON t.fk_responsavel = r.id WHERE t.deleted_at is null"
        );
        return $result->getResultArray();
    }

    public function setFinalizarTarefa($id) {
        $sql = "UPDATE tarefas SET updated_at=now(), situacao_registro=2 WHERE id=".$id;
        $result = $this->db->query($sql);
        return $result;
    }

}
