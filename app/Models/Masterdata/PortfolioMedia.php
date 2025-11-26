<?php
namespace App\Models\Masterdata;

use CodeIgniter\Model;

class PortfolioMedia extends Model
{
    protected $table = 'portfolio_media';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'portfolio_id', 'file_url', 'media_type'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}