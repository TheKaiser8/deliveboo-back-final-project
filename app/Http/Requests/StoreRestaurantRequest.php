<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:50',
            'street_address' => 'required|string|max:50',
            'postal_code' => 'required|string|size:5',
            'vat_number' => 'required|string|size:11',
            'image' => 'nullable|image|max:2048',
            'kitchens'=> 'required'
        ];
    }
}
