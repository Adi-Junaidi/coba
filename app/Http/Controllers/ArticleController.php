<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'title' => 'Daftar Artikel',
      'articles' => Article::all(),
    ];

    return \view('user-pikr/artikel/index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data = [
      'title' => 'Tambah Artikel',
    ];


    return \view('user-pikr/artikel/create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:articles',
      'body' => 'required',
      'image' => 'required|image|file|max:1024',
      'document' => 'mimes:pdf,docx,xlsx,pptx|file|max:2048',
    ]);

    $validatedData['pikr_id'] = \session('pikr_id');
    $randomName = \uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
    $validatedData['image'] = $request->file('image')->storeAs('article-image', $randomName);

    if ($request->file('document')) {
      $validatedData['document'] = $request->file('document')->store('article-document');
    }

    $validatedData['bulan_tahun'] = date('m-Y');

    Article::create($validatedData);


    return \redirect('/up/article');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    return view('home.detail', [
      'title' => 'Detail Artikel',
      'article' => $article,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {

    $data = [
      'title' => 'Edit Artikel',
      'article' => $article,
    ];


    if ($article->pikr->id != \session('pikr_id')) {
      abort(403);
    }

    return view('user-pikr.artikel.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Article $article)
  {
    if ($article->pikr->id != \session('pikr_id')) {
      abort(403);
    }

    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:articles,slug,' . $article->id,
      'body' => 'required',
      'image' => 'image|file|max:1024',
      'document' => 'mimes:pdf|file|max:2048',
    ]);

    $validatedData['pikr_id'] = $article->pikr->id;

    if ($request->file('image')) {
      if ($article->image) Storage::delete($article->image);
      $randomName = \uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
      $validatedData['image'] = $request->file('image')->storeAs('article-image', $randomName);
    }

    if ($request->file('document')) {
      if ($article->document) Storage::delete($article->document);
      $validatedData['document'] = $request->file('document')->store('article-document');
    }

    $article->update($validatedData);

    return \redirect('up/article');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    if ($article->image) {
      Storage::delete($article->image);
    }

    if ($article->document) {
      Storage::delete($article->document);
    }

    Article::destroy($article->id);
    return \redirect('/up/article');
  }

  /**
   * Display all the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function showAll()
  {
    return view('landing.articles', [
      'articles' => Article::orderBy('created_at', 'desc')->get()
    ]);
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
    return response()->json(['slug' => $slug]);
  }

  public function getArticle(Article $article)
  {
    $article['nama_pikr'] = $article->pikr->nama;
    $article['update'] = $article->updated_at->diffForHumans();
    
    return response()->json($article);
  }

}
