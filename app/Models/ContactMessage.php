<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name', 'company', 'email', 'phone', 'subject', 'message',
        'locale', 'is_read', 'ip_address',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
