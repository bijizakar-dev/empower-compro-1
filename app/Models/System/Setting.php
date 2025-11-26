<?php

namespace App\Models\System;

use CodeIgniter\Model;

class Setting extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;

    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'site_name',
        'logo',
        'contact_email',
        'contact_phone',
        'address',
        'social_facebook',
        'social_instagram',
        'social_youtube',
        'social_tiktok',
        'active',
    ];
}