<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\Store as StoreRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Models\Brand;
use App\Models\Car;

class Cars extends Controller
{
    public function index(){
        $cars = Car::with('brand')->orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    public function create(){
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        return view('cars.create', compact('transmissions', 'brands'));
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
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        return view('cars.edit', compact('car', 'transmissions', 'brands'));
    }

    public function update(UpdateRequest $request, Car $car){
        $car->update($request->validated());
        return redirect()->route('cars.show', [$car->id])->with('alert', trans('alert.cars.edited'));
    }

    public function destroy(Car $car){
        $car->delete();
        return redirect()->route('cars.index')->with('alert', trans('alert.cars.deleted'));
    }

    public function trashed(){
        $cars = Car::onlyTrashed()->orderByDesc('created_at')->get();
        return view('cars.trashed', compact('cars'));
    }

    public function restore(string $id){
        // dd($car) - not found - в корзине и модель не может ее найти
        $car = Car::onlyTrashed()->findOrFail($id);
        if(Car::where('vin', $car->vin)->exists()){
            return redirect()->route('cars.trashed')->with('alert', trans('alert.cars.restore-fail-vin', ['vin' => $car->vin])); 
        }
        
        $car->restore();
        return redirect()->route('cars.index');
    }
}
