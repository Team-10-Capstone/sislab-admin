<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'aktivitas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'description',
        'type',
        'user_id',
        'read_at',
    ];

    protected $useTimestamps = true; // Set to true if you want to use timestamps

    protected $dateFormat = 'datetime'; // Change the format to 'datetime' instead of 'date'

    protected $createdField = 'created_at'; // Change the created field to 'created_at'

    protected $updatedField = 'updated_at'; // Change the updated field to 'updated_at'

    protected $deletedField = 'deleted_at'; // Change the deleted field to 'deleted_at's


}