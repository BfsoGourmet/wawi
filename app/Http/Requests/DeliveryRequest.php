<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CourierRequest
 *
 * @package App\Http\Requests
 */
class DeliveryRequest extends FormRequest
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
            'customer_firstname' => 'required',
            'customer_lastname' => 'required',
            'delivery_address' => 'required',
            'delivery_zip' => 'required',
            'delivery_place' => 'required',
            'delivery_country' => 'required',
            'courier_id' => 'courier_id'

        ];
    }
}
