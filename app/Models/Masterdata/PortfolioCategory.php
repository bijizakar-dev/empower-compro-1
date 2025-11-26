<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class PortfolioCategory extends Model
{
    protected $table            = 'portfolio_categories';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;

    protected $allowedFields    = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}