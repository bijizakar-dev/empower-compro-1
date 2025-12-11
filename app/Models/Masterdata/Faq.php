<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class Faq extends Model
{
    protected $table            = 'faqs';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'lang',
        'question',
        'answer',
        'sort_order',
        'is_active'
    ];

    protected $validationRules = [
        'question' => 'required|max_length[255]',
        'answer'   => 'required',
    ];
}