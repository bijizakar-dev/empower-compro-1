<?php

namespace App\Models\Masterdata;

use CodeIgniter\Model;

class Team extends Model
{
    protected $table            = 'team';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;

    protected $allowedFields = [
        'name',
        'position',
        'photo',
        'bio',
        'instagram_url',
        'linkedin_url',
        'twitter_url'
    ];

    // Timestamps
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}