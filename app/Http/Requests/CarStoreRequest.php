<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:cars,name',
            'acceleration' => 'required|numeric|min:1|max:1000',
            'horsepower' => 'required|integer|between:1,3000',
            'top_speed' => 'required|integer|between:1,1000',
            'length' => 'required|numeric|min:1|max:10000',
            'width' => 'required|numeric|min:1|max:10000',
            'height' => 'required|numeric|min:1|max:10000',
            'max_load' => 'required|numeric|between:1,10000',
            'car_model_id' => 'required|integer|exists:car_models,id',
            'stock' => 'required|integer|between:1,1000000',
            'price' => 'required|numeric|min:500|max:10000000|decimal:0,2',
//            'effects' => 'required|date'
        ];
    }
}
