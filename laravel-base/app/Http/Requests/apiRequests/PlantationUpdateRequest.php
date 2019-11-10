<?php

namespace App\Http\Requests\apiRequests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class PlantationUpdateRequest extends FormRequest
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
            'name' =>'string|max:255',
            'planted_at' => 'date',
            'description' => 'string',
            'backyard_id'=> 'exists:backyards,id',
            'type_id'=> 'exists:types,id'
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'data'=> $validator->messages(),
                'msg' => "Validation error!"
            ],422)
            );
    }
}
