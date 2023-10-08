<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\Concerns\SoftDeletes;

class AdminModel extends Model
{
    use SoftDeletes;
    protected $table = 'admin';
    protected $primaryKey = 'adminId';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'name',
        'roleId',
        'email',
        'password',
        'mobile',
        'isDeleted',
    ];

    protected $deletedField = 'deleted_at';
}