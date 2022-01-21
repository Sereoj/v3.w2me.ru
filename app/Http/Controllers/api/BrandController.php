<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::all();
    }

    public function store(BrandRequest $request)
    {
        return Brand::create($request->all());
    }

    public function show(Brand $brand)
    {
        return $brand;
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());
        return $brand;
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return $brand;
    }
}
