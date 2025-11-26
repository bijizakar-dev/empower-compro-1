<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class PriceList extends Model
{
    protected $table            = 'price_list';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';

    protected $allowedFields    = [
        'package_name',
        'price',
        'description',
        'features',
        'popular',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}