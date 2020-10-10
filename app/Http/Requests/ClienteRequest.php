<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombre'=>'required|string|min:3|max:250',
            'apellido'=>'required|string|min:3|max:250',
            'tipo'=>'required|string|min:2|max:3',
            'documento'=>'required|regex:/(^([0-9-]+)(\d+)?$)/u',
            'telefono'=>'required|numeric|min:999999|max:999999999999',
            'cupo'=>'required|numeric',
        ];
    }
}
