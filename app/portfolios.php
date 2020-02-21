<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolios extends Model
{
    // 以下を追記
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

    protected $guarded = ['id'];

    // 以下を追記
    // Newsモデルに関連付けを行う
    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
