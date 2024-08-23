<?php

namespace App\Http\Controllers\Public;

use App\Models\Car;
use App\Http\Controllers\Controller;

class Cars extends Controller{
    public function index(){
        $cars = Car::with('brand')->orderByDesc('created_at')->get();
        return view('public.cars.index', compact('cars'));
    }
    public function show(Car $car){
        return view('public.cars.show', compact('car'));
    }
}
