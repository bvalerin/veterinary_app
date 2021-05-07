<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendamientoModel extends Model
{
    protected $table = 'agendamiento';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_mascota', 'id_cliente', 'fecha', 'asunto', 'contenido', 'activo'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_update';
    protected $deletedField = null;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function getList($id_mascota)
    {
        //trae los agendamientos por mascota
        $query = $this->db->table('agendamiento AS a');
        $query->select('a.*, m.nombre AS mascota,concat(c.nombre," ",c.apellido) AS cliente');
        $query->join('mascota AS m', 'm.id = a.id_mascota');
        $query->join('cliente AS c', 'c.id = a.id_cliente');
        $query->where('a.id_mascota', $id_mascota);
        $query->where('a.activo', 1);
        $querys = $query->get()->getResult();
        return $querys;
    }

    public function getListDelete($id_mascota)
    {
        //eliminar el agendamiento
        $query = $this->db->table('agendamiento AS a');
        $query->select('a.*, m.nombre AS mascota');
        $query->join('mascota AS m', 'm.id = a.id_mascota');
        $query->where('a.id_mascota', $id_mascota);
        $query->where('a.activo', 0);
        $querys = $query->get()->getResult();
        return $querys;
    }

    public function getListDeleteTotal()
    {
        //eliminar el agendamiento
        $query = $this->db->table('agendamiento AS a');
        $query->select('a.*, m.nombre AS mascota,concat(c.nombre," ",c.apellido) AS cliente');
        $query->join('mascota AS m', 'm.id = a.id_mascota');
        $query->join('cliente AS c', 'c.id = a.id_cliente');
        $query->where('a.activo', 0);
        $querys = $query->get()->getResult();
        return $querys;
    }


    public function getListTotal()
    {
        //trae toda los agendamientos
        $query = $this->db->table('agendamiento AS a');
        $query->select('a.*, m.nombre AS mascota,concat(c.nombre," ",c.apellido) AS cliente');
        $query->join('mascota AS m', 'm.id = a.id_mascota');
        $query->join('cliente AS c', 'c.id = a.id_cliente');
        $query->where('a.fecha = CURDATE()');
        $query->where('a.activo',1);

        $querys = $query->get()->getResult();
        return $querys;
    }

    public function getListTotalNo()
    {
        //trae toda los agendamientos que no asistieron
        $query = $this->db->table('agendamiento AS a');
        $query->select('a.*, m.nombre AS mascota,concat(c.nombre," ",c.apellido) AS cliente');
        $query->join('mascota AS m', 'm.id = a.id_mascota');
        $query->join('cliente AS c', 'c.id = a.id_cliente');
        $query->where('a.fecha < CURDATE()');
        $query->where('a.activo',1);

        $querys = $query->get()->getResult();
        return $querys;
    }
}
