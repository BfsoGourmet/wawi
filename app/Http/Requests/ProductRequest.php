<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProductRequest
 *
 * @package App\Http\Requests
 */
class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'declaration' => 'required',
            'calories' => 'required',
            'sugar' => 'required',
            'price' => 'required|numeric',
            'special_price_active' => 'nullable',
            'is_live' => 'nullable',
            'category' => 'required|integer',
            'producer_id' => 'required|integer',
            'courier' => 'required|integer',
            'stock_count' => 'required|integer'
        ];
    }
}
