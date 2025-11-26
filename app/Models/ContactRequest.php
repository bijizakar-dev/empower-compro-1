<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactRequest extends Model
{
    protected $table      = 'contact_requests';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'service_id',
        'message',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}