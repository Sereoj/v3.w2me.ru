<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;

class BrandsListController extends Controller
{
    public function getBrands()
    {
        return Brands::all();
    }

    public function getBrand($id)
    {
        if(is_numeric($id))
            return Brands::find($id);
        else
            return "null";
    }
    public function addBrand(Request $request)
    {
        $value = $request->only('name');

        if(!empty($value))
        {
            if(Brands::whereName($value)->get() != $value)
            {
                return Brands::create($request->only('name','icon', 'tag'));
            }
        }
    }
}
