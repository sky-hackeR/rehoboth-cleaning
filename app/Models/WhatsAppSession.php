<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppSession extends Model
{
    protected $fillable = ['phone_number', 'current_step', 'collected_data'];

    protected $casts = [
        'collected_data' => 'array',
    ];
}
