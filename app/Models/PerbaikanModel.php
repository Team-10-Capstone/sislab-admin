<?php

namespace App\Models;

use CodeIgniter\Model;

class PerbaikanModel extends Model
{
    protected $table = 'perbaikan_pengujian';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields = ['id_fppc', 'alasan', 'status'];
}