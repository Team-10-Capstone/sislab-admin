<?php

namespace App\Models;

use CodeIgniter\Model;

class BentukModel extends Model
{
    protected $table = 'bentuk';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nama_bentuk'];
}