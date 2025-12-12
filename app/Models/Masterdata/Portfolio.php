<?php
namespace App\Models\Masterdata;

use CodeIgniter\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'category_id', 'title', 'description', 'client_name',
        'project_date', 'thumbnail', 'link_url'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Get portfolio + category
    public function getAllWithCategory()
    {
        return $this->select('portfolio.*, portfolio_categories.name as category_name')
                    ->join('portfolio_categories', 'portfolio_categories.id = portfolio.category_id', 'left')
                    ->orderBy('portfolio.id', 'DESC')
                    ->findAll();
    }
}