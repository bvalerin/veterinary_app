<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaServicioModel extends Model
{
    protected $table = 'consulta_servicio';
    protected $primaryKey = 'id_cs';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_servicio', 'id_consulta', 'observacion','precio','activo'];

    protected $useTimestamps = false;
    protected $createdField = null;
    protected $updatedField = null;
    protected $deletedField = null;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function updateservicesconsult($id,$data){
        // $this->where('id_consulta', $id);
        $this->update($data, ['id_consulta' => $id]);
    }
}