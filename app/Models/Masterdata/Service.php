<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class Service extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;

    protected $allowedFields    = [
        'title',
        'description',
        'icon',
        'sort_order',
        'active',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Optional: default order
    protected $orderBy = 'sort_order ASC';
}