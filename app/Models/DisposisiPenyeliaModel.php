<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiPenyeliaModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'disposisi_penyelia';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'manajer_teknis_id',
        'penyelia_id',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Define any validation rules or custom behaviors here if needed.


}