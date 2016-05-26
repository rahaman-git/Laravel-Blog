<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//use Request;  //use Illuminate\Http\Request;


class ArticlesController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth', ['only' => 'create']);

        $this->middleware('auth', ['except' => 'index']);

//        $this->middleware('demo', ['only' => 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return \Auth::user()->username;

        $articles = Article::latest('published_at')->published()->get();

        $latest = Article::latest()->first();

        return view('articles.index', compact('articles', 'latest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if(Auth::guest()){
//            return redirect('/articles');   // Instead of this there is middleware.
//        }
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //Article::create($request -> all());

//        $article = new Article($request->all());
//        Auth::User()->articles()->save($article);

        $this->createArticle($request);

//        \Session::flash('flash_message', 'Your article has been created successfully');
//        session()->flash('flash_message', 'Your article has been created successfully');

//        return redirect('articles')->with([
//            'flash_message' => 'Your article has been successfully created',
//            'flash_message_important' => false
//        ]);

        flash()->success('Your article has been successfully created'); //->important();

//        flash()->overlay('Your article has been successfully created', 'Good Job');

        return redirect('articles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //$article = Article::findOrFail($id);

        //dd($article->published_at);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idd
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);

        $tags= Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function about()
    {
        return view ('articles.about');
    }

    /**
     * @param ArticleRequest $request
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::User()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

}

