<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class portfolioController extends Controller
{
    public function add()
  {
      return view('admin.portfolio.create');
  }

// 以下を追記
  public function create(Request $request)
  {
      // admin/news/createにリダイレクトする
      return redirect('admin/portfolio/create');
  }  
}