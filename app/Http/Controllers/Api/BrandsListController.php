<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsListController extends Controller
{
    public function getBrands()
    {
        return Brands::all()->where('status', 'Active');
    }

    public function getBrand($id)
    {
        if(is_numeric($id))
            return Brands::find($id);
        else
            return "null";
    }

    public function store(BrandRequest $request)
    {
        return Brands::create($request->only('name','icon', 'tag'));
    }

    public function update(Brands $brand, Request $request)
    {
        $brand->update($request->all());
        return $brand;
    }

    public function destroy(Brands $brands)
    {
        $brands->delete();
        return ['deleted' => true];
    }

}
