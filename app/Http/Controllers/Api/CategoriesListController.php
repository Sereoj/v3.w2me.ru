<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesListController extends Controller
{
    public function getCategories()
    {
        return Categories::all();
    }

    public function getCategory($id)
    {
        if(is_numeric($id))
            return Categories::find($id);
        else
            return "null";
    }

    public function store(CategoryRequest $request)
    {
        return Categories::create($request->only('name','icon', 'tag'));
    }

    public function update(Categories $categories, Request $request): Categories
    {
        $categories->update($request->all());
        return $categories;
    }

    public function destroy(Categories $categories) : array
    {
        $categories->delete();
        return ['deleted' => true];
    }
}
