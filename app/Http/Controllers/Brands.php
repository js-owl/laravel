<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brands\Store as StoreRequest;
use App\Http\Requests\Brands\Update as UpdateRequest;
use App\Models\Brand;

class Brands extends Controller
{
    public function index(){
        $brands = Brand::orderByDesc('title')->get();
        return view('brands.index', compact('brands'));
    }

    public function create(){ return view('brands.create'); }

    public function store(StoreRequest $request){
        $brand = Brand::create($request->validated());
        return redirect()->route('brands.show', [$brand->id]);
    }

    public function show(Brand $brand){ return view('brands.show', compact('brand')); }
    public function edit(Brand $brand){ return view('brands.edit', compact('brand')); }

    public function update(UpdateRequest $request, Brand $brand){
        $brand->update($request->validated());
        return redirect()->route('brands.index', compact('brand'));
    }

    public function destroy(Brand $brand){
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
