<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::with(['category', 'tags'])->get();
        return self::sendResponse(200,'the articles are',$articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article=Article::create($request->except('tag_id'));
        $article->tags()->attach($request->tag_id);
        return self::sendResponse(201,'the article is added successfully');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $entity=$article->with(['category', 'tags'])->first();
        return self::sendResponse(200,'the article is',$entity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->except('tag_id'));
        $article->tags()->sync($request->tag_id);
        return self::sendResponse(201,'the article is updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Article $article)
    {
        $article->delete();
        return self::sendResponse(200,'the article is deleted');
    }
}
