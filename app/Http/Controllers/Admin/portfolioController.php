<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
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
    $this->validate($request, portfolio::$rules);

      $portfolios = new Portfolio;
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
      // admin/portfolio/にリダイレクトする
      return redirect('admin/portfolio');
  }  
  
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Portfolio::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのホテル名を取得する
          $posts = Portfolio::all();
      }
      return view('admin.portfolio.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  

  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $portfolios = Portfolio::find($request->id);
      if (empty($portfolios)) {
        abort(404);    
      }
      return view('admin.portfolio.edit', ['portfolios_form' => $portfolios]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Portfolio::$rules);
      $portfolios = Portfolio::find($request->id);
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
        $history->portfolio_id = $portfolios->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
      return redirect('admin/portfolio');
  }
  
  public function delete(Request $request)
  {
      // 該当する Portfolio Modelを取得
      $portfolios = Portfolio::find($request->id);
      // 削除する
      $portfolios->delete();
      return redirect('admin/portfolio/');
  }  
}