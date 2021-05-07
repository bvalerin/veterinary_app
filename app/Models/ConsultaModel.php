<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_servicio', 'id_mascota', 'id_veterinario', 'fecha', 'pesoMascota', 'observacion', 'precioSugerido', 'activo'];

    protected $useTimestamps = true;
    protected $createdField = "fecha_alta";
    protected $updatedField = 'fecha_update';
    protected $deletedField = null;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function getList($id_mascota){
        $query = $this->db->table('consulta AS c');
        $query->select('c.*, m.nombre AS mascota');
        $query->join('mascota AS m','m.id = c.id_mascota');
        $query->where('c.id_mascota',$id_mascota);
        $querys = $query->get()->getResult();
        return $querys;        
    }

    public function insert_consulta($array)
    {
        $this->insert($array);
        return $this->insertID();
    }

    public function getConsulta($idconsulta){

        $query = $this->db->table('consulta AS c');
        $query->select('c.id, c.fecha, CONCAT(ct.nombre," ",ct.apellido) AS nombre_cliente, m.nombre AS mascota,  ee.nombre AS especie, r.nombre AS raza, m.edad, c.pesoMascota');
        $query->join('consulta_servicio AS cs','cs.id_consulta = c.id');
        $query->join('servicio AS s','s.id = cs.id_servicio');
        $query->join('cliente AS ct','ct.id = c.id_veterinario');
        $query->join('mascota AS m','m.id = c.id_mascota');
        $query->join('especie AS ee','ee.id = m.id_especie');
        $query->join('raza AS r','r.id = m.id_raza');
        $query->where('c.id',$idconsulta);
        $query->groupBy('c.id');
        $querys = $query->get()->getResult();
        return $querys;      

    }
    public function getConsultaService($idconsulta){

        $query = $this->db->table('consulta AS c');
        $query->select('c.id, c.fecha, s.nombre AS servicio,s.id AS id_servicio,cs.observacion,s.precio');
        $query->join('consulta_servicio AS cs','cs.id_consulta = c.id');
        $query->join('servicio AS s','s.id = cs.id_servicio');
        $query->where('c.id',$idconsulta);
        $querys = $query->get()->getResult();
        return $querys;      
    }
    
    public function getConsultaMascota($idmascota){
        $query = $this->db->table('consulta AS c');
        $query->select('c.id AS id_consulta, m.id AS id_mascota, CONCAT(v.nombre," ",v.apellido) AS nombre_veterinario, c.fecha, CONCAT(ct.nombre," ",ct.apellido) AS nombre_cliente, m.nombre AS mascota, ee.nombre AS especie, r.nombre AS raza, m.edad, c.pesoMascota');
        $query->join('consulta_servicio AS cs','cs.id_consulta = c.id');
        $query->join('servicio AS s','s.id = cs.id_servicio');
        $query->join('cliente AS ct','ct.id = c.id_veterinario');
        $query->join('veterinario AS v','v.id = c.id_veterinario');
        $query->join('mascota AS m','m.id = c.id_mascota');
        $query->join('especie AS ee','ee.id = m.id_especie');
        $query->join('raza AS r','r.id = m.id_raza');
        $query->where('c.id_mascota',$idmascota);
        $query->limit(1);
        $querys = $query->get()->getResult();
        return $querys;
        
    }
    public function getConsultaServiceMascota($consulta){

        $query = $this->db->table('consulta AS c');
        $query->select('c.id, c.fecha, c.pesoMascota');
        // $query->join('consulta_servicio AS cs','cs.id_consulta = c.id');
        $query->where('c.id',$consulta);
        $querys = $query->get()->getResult();
        return $querys;      
    }

    public function serviciosconsultamascota($id_consulta){
        $query = $this->db->table('consulta AS c');
        $query->select('c.id, s.id AS id_servicio, s.nombre AS servicio, cs.observacion, s.precio');
        $query->join('consulta_servicio AS cs','cs.id_consulta = c.id');
        $query->join('servicio AS s','s.id = cs.id_servicio');
        $query->where('c.id',$id_consulta);
        $querys = $query->get()->getResult();
        return $querys;     
    }

    public function getMscotaConsutas($idmascota){

        $query = $this->db->table('consulta AS c');
        $query->select('c.id');
        $query->where('c.id_mascota',$idmascota);
        $querys = $query->get()->getResult();
        return $querys;      

    }

}
