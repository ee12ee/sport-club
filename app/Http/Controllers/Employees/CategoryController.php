<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $categories= Category::with('articles')->get();
        return self::sendResponse(200,'the categories with articles are',$categories);
    }

    public function store(CategoryRequest $request)
    {
      Category::create($request->all());
      return self::sendResponse(201,'the category is added successfully');
    }
    public function show(Category $category)
    {
        $entity=$category->with('articles')->first();
        return self::sendResponse(200,'the category is',$entity);
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return self::sendResponse(201,'the category is updated successfully');

    }
    public function destroy( Category $category)
    {
        $category->delete();
        return self::sendResponse(200,'the category is deleted');
    }
}
