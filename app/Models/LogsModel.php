<?php

namespace App\Models;

use CodeIgniter\Model;

class LogsModel extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_veterinario', 'evento','ip','detalles'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha';
    protected $updatedField = null;
    protected $deletedField = null;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
