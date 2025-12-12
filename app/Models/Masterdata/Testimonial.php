<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class Testimonial extends Model
{
    protected $table      = 'testimonials';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;
    protected $returnType     = 'object';

    protected $allowedFields = [
        'author_name',
        'author_title',
        'author_company',
        'rating',
        'message',
        'photo',
        'sort_order',
        'is_active'
    ];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}