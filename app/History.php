<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public static $rules = [
        'portfolios_id' => 'required',
        'edited_at' => 'required',
        
        'presence' => 'required',
        'amenities' => 'required',
        'star' => 'required',
    ];

    protected $guarded = ['id'];
}
