<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 追記
use App\portfolios;

class portfolioController extends Controller
{
    public function index(Request $request)
    {
        $posts = portfolio::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('portfolios.index', ['headline' => $headline, 'posts' => $posts]);
    }
}