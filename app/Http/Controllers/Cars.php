<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\Store as StoreRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Models\Car;

class Cars extends Controller
{
    public function index(){
        $cars = Car::orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    public function create(){
        $transmissions = config('app-cars.transmissions');
        return view('cars.create', compact('transmissions'));
    }

    public function store(StoreRequest $request){
        $car = Car::create($request->validated());
        return redirect()->route('cars.show', [$car->id]);
    }

    public function show(Car $car){
        // $post = Post::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car){
        // $car = Car::findOrFail($id);
        $transmissions = config('app-cars.transmissions');
        return view('cars.edit', compact('car', 'transmissions'));
    }

    public function update(UpdateRequest $request, Car $car){
        $car->update($request->validated());
        return redirect()->route('cars.show', [$car->id]);
    }

    public function destroy(Car $car){
        $car->delete();
        return redirect()->route('cars.index');
    }
}
