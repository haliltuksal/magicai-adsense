<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsenseSetting extends Model
{
    protected $fillable = [
        'adsense_code',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'enabled_pages' => 'array'
    ];
}