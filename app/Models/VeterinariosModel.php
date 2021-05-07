<?php

namespace App\Models;

use CodeIgniter\Model;

class VeterinariosModel extends Model
{
    protected $table = 'veterinario';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tipoDoc', 'cedula', 'pasaporte', 'matricula', 'apellido', 'nombre', 'usuario', 'password', 'email', 'direccion', 'convencional', 'telefono', 'activo'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_update';
    protected $deletedField = null;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
