<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'username',
        'email',
        'typeof_document',
        'document_number',
        'password',
        'avatar',
        'alamat',
        'no_telp',
        'npwp',
        'ktp',
        'pt',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';

    // Validation rules go here if needed.

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}