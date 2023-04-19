<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUsersByClassId($class_id)
    {
        return $this->where('student_class_id', $class_id)->findAll();
    }
    public function getStudentsGroupedByClass()
    {
        $builder = $this->db->table('users');
        $builder->select('users.*, classes.class_name');
        $builder->join('classes', 'users.student_class_id = classes.class_id');
        $builder->orderBy('classes.class_name', 'ASC');
        $query = $builder->get();

        $result = [];
        foreach ($query->getResultArray() as $row) {
            $result[$row['class_name']][] = $row;
        }

        return $result;
    }
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['email', 'password'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}