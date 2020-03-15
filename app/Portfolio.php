<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    // 以下を追記
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        'prefecture' => 'required',
        'prefecture_code' => 'required',
        'tel' => 'required',
        'address' => 'required',
        'presence' => 'required',
        'amenities' => 'required',
        'star' => 'required',

         // 入力にチェックするものを入れておく　1/19 データベース参照にしながらやる
    ];

    protected $guarded = ['id'];

    // 以下を追記
    // Newsモデルに関連付けを行う
    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
