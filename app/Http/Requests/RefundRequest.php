<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefundRequest extends FormRequest
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
        $rules = [
            'payment' => 'required',
            'transfer' => 'required',
        ];

        if ($this->payment == 'partialRefund')
        {
            $rules['partialAmount'] = 'required|numeric';
        }
        return $rules;
    }
}
