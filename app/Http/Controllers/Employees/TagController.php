<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $tags= Tag::with('articles')->get();
        return self::sendResponse(200,'the tags with articles are',$tags);
    }

    public function store(TagRequest $request)
    {
      Tag::create($request->all());
      return self::sendResponse(201,'the tag is added successfully');
    }
    public function show(Tag $tag)
    {
        $entity=$tag->with('articles')->first();
        return self::sendResponse(200,'the tag is',$entity);
    }
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        return self::sendResponse(201,'the tag is updated successfully');

    }
    public function destroy( Tag $tag)
    {
        $tag->delete();
        return self::sendResponse(200,'the tag is deleted');
    }
}
