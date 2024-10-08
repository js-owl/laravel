<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\Store as StoreRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use App\Services\AddressParser\ParserInterface;
use Illuminate\Support\Facades\DB;
use Throwable;
use Dadata\DadataClient;

class Cars extends Controller
{
    public function index(ParserInterface $dadata){
        // $res = $dadata->clean('мск сухонская 11 89');
        // dd($res);

        $cars = Car::orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    public function create(){
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        return view('cars.create', compact('transmissions', 'brands', 'tags'));
    }

    public function store(StoreRequest $request){
        $data = collect($request->validated());
        $car = Car::make($data->except(['tags'])->toArray());

        DB::transaction(function() use ($data, $car){
            $car->save();
            $car->tags()->sync($data->get('tags'));
        });
        return redirect()->route('cars.show', [$car->id]);
    }

    public function show(Car $car){
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car){
        $transmissions = config('app-cars.transmissions');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        return view('cars.edit', compact('car', 'transmissions', 'brands', 'tags'));
    }

    public function update(UpdateRequest $request, Car $car){
        $data = collect($request->validated());
        $car->update($data->except(['tags'])->toArray());
        $car->tags()->sync($data->get('tags'));
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
