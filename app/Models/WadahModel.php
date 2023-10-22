<?php

namespace App\Models;

use CodeIgniter\Model;

class WadahModel extends Model
{
    protected $table = 'wadah';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nama_wadah', 'image'];
}