<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\portfolio;
use App\History;

use Carbon\Carbon;

class portfolioController extends Controller
{
    public function add()
  {
      return view('admin.portfolio.create');
  }

// 以下を追記
  public function create(Request $request)
  {
    $this->validate($request, portfolios::$rules);

      $portfolios = new portfolios;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $portfolios->image_path = basename($path);
      } else {
          $portfolios->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $portfolios->fill($form);
      $portfolios->save();
      // admin/news/createにリダイレクトする
      return redirect('admin/portfolio/create');
  }  
  
  // 以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = portfolios::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = portfolios::all();
      }
      return view('admin.portfolio.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  

  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $portfolios = portfolios::find($request->id);
      if (empty($portfolios)) {
        abort(404);    
      }
      return view('admin.portfolios.edit', ['portfolios_form' => $portfolios]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, portfolios::$rules);
      $portfolios = portfolios::find($request->id);
      $portfolios_form = $request->all();
      if (isset($portfolios_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $portfolios->image_path = basename($path);
        
      } elseif (isset($request->remove)) {
        $portfolios->image_path = null;
        
      }
      
      unset($portfolios_form['_token']);
      unset($portfolios_form['remove']);
      unset($portfolios_form['image']);
      $portfolios->fill($portfolios_form)->save();
      
      // 以下を追記
        $history = new History;
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
      return redirect('admin/portfolios');
  }
  
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $portfolios = portfolios::find($request->id);
      // 削除する
      $portfolios->delete();
      return redirect('admin/portfolios/');
  }  
}