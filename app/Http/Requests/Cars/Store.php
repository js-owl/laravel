<?php

namespace App\Http\Requests\Cars;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        $transmissions = config('app-cars.transmissions');
        return [
            'brand' => 'required|min:3|max:5',
            'model' => 'required|min:3|max:5',
            'transmission' => ['required', Rule::in(array_keys($transmissions))],
            'vin' => ['required','min:4','max:4', $this->vinUniqueRule()],
        ];
    }
    // 'vin' => ['required','min:4','max:4','unique:cars,vin'],

    public function attributes()    {
        return [
            'brand' => 'Марка',
            'model' => 'Модель',
            'transmission' => 'Коробка передач',
            'vin' => 'vin номер',
        ];
    }

    protected function vinUniqueRule(){
        return Rule::unique(Car::class,'vin');
    }
}
