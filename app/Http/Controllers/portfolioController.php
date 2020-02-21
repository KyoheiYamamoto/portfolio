<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記

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

        // portfolio/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('portfolios.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
