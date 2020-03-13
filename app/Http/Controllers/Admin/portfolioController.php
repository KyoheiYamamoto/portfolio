<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;
use App\History;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;
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
        // フォームから画像が送信されてきたら、保存して、$portfolios->image_path に画像のパスを保存
        if (!empty($form['image1'])) {
            // リサイズ
            Self::resizeFile($form['image1']);

            $path1 = Storage::disk('s3')->putFile('/',$form['image1'],'public');
            // $path1 = $request->file('image1')->store('public/image');
            $portfolios->image_path1 = Storage::disk('s3')->url($path1);
        } else {
            $portfolios->image_path1 = null;
        }
        if (!empty($form['image2'])) {
            Self::resizeFile($form['image2']);
            $path2 = Storage::disk('s3')->putFile('/',$form['image2'],'public');
            // $path2 = $request->file('image2')->store('public/image');
            $portfolios->image_path2 = Storage::disk('s3')->url($path2);
        } else {
            $portfolios->image_path2 = null;
        }
        if (!empty($form['image3'])) {
            Self::resizeFile($form['image3']);
            $path3 = Storage::disk('s3')->putFile('/',$form['image3'],'public');
            // $path3 = $request->file('image3')->store('public/image');
            $portfolios->image_path3 = Storage::disk('s3')->url($path3);
        } else {
            $portfolios->image_path3 = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token'], $form['image1'], $form['image2'], $form['image3']);
        // フォームから送信されてきたimageを削除する
        // データベースに保存する
        $portfolios->fill($form);
        $portfolios->save();
        // admin/portfolio/にリダイレクトする
        return redirect('admin/portfolio');
    }
    // リサイズファイルの調整
    private static function resizeFile($file){
        // 画像を縦300:横400でリサイズする
        (file_get_contents($file->getRealPath()));
        $image = \Image::make(file_get_contents($file->getRealPath()));
        $image
            ->resize(300, 400)
            // リサイズ画像の保存する
            ->save(public_path() . '/',$form['image1'], $form['image2'],$form['image3'],'public' . $file->hashName());
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
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $portfolios->image_path = Storage::disk('s3')->url($path);
        } elseif (isset($request->remove)) {
            $portfolios->image_path = null;
        }
        unset($portfolios_form['_token'], $portfolios_form['remove'], $portfolios_form['image']);
        $portfolios->fill($portfolios_form)->save();

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
    public function detail(Request $request)
    {
        // portfolio Modelからデータを取得する
        $portfolios = Portfolio::find($request->id);
        if (empty($portfolios)) {
          abort(404);
        }
        return view('admin.portfolio.detail', ['portfolio' => $portfolios]);
    }
}
