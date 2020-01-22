<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
   protected $guarded = array('id');
    // 以下を追記
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        'prefecture' => 'required',
        'prefecture_code' => 'required',
        'tel' => 'required',
        'address' => 'required',
        
         // 入力にチェックするものを入れておく　1/19 データベース参照にしながらやる
    );
    
    // 以下を追記
    // Newsモデルに関連付けを行う
    public function histories()
    {
      return $this->hasMany('App\History');

    }
}
