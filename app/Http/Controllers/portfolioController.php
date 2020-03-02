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
    public function store(Request $request)
{
  $params = $request->validate([
      'image' => 'required|file|image|max:4000',
  ]);

  $file = $params['image'];

  $image = \Image::make(file_get_contents($file->getRealPath()));
  $image
      ->save(public_path().'/images/'.$file->hashName())
      ->resize(300, 300)
      ->save(public_path().'/images/300-300-'.$file->hashName())
      ->resize(500, 500)
      ->save(public_path().'/images/500-500-'.$file->hashName());

  return redirect('/images/'.$file->hashName());
}
}
