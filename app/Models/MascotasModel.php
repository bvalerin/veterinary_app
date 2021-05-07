<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotasModel extends Model
{
    protected $table = 'mascota';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cliente', 'id_especie', 'id_raza', 'nombre', 'edad', 'sexo', 'pelaje', 'activo'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_update';
    protected $deletedField = null;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function getList($id_cliente)
    {
        //une la tablas cliente especie raza mascota para poder llenar los datables con la informacion
        
        $query = $this->db->table('mascota as m');
        $query->select('concat(c.nombre, c.apellido) AS cliente, m.*, e.nombre as especie, r.nombre as raza,c.email_cliente as email');
        $query->join('cliente AS c', 'c.id = m.id_cliente');
        $query->join('especie AS e', 'e.id = m.id_especie');
        $query->join('raza AS r', 'r.id = m.id_raza');
        $query->where('c.id', $id_cliente);
        $query->where('m.activo', 1);
        $querys = $query->get()->getResult();
        return $querys;
    }
}
