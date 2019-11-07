<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class BackyardStoreRequest extends FormRequest
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
            'name' =>'required|string|max:255',
            'description' => 'string',
            'image' => 'image',
            'user_id'=>'required|exists:users,id'
        ];
    }

    /*public function messages(){
        return [
            'name' => "a name for the backyard is required.",
            'description' => "only text.",
            'image' => "insert a valid image."
        ];
    }*/

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'data'=> $validator->messages(),
                'msg' => "Validation error!"
            ],422)
            );
    }
}
