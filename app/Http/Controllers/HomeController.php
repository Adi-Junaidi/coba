<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('home.index', [
      'articles' => Article::orderBy('updated_at', 'desc')->limit(5)->get(),
      'ranks' => Result::where('bulan_tahun', date('m-Y'))->orderBy('point', 'desc')->get(),
    ]);
  }

  public function articles()
  {
    return view('home.articles', ['articles' => Article::all()]);
  }

  public function article(Article $article)
  {
    return \view('home.detail', [
      'article' => $article,
    ]);
  }
}
