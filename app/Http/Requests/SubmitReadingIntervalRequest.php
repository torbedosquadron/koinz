<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SubmitReadingIntervalRequest extends FormRequest
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
            'user_id'     => 'required|int|exists:App\Models\User,id',
            'book_id'     => 'required|int|exists:App\Models\Book,id',
            'start_page'  => 'required|int|min:1',
            'end_page'    => 'required|int|min:2|gte:start_page',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'A user_id is required',
            'user_id.int'      => 'A user_id should be integer',
            'user_id.exists'   => 'A user_id should exists in users table',

            'book_id.required' => 'A book_id is required',
            'book_id.int'      => 'A book_id should be integer',
            'book_id.exists'   => 'A book_id should exists in books table',

            'start_page.required' => 'A start_page is required',
            'start_page.int'      => 'A start_page should be integer',
            'start_page.min'      => 'A start_page should be greater than zero',

            'end_page.required' => 'A end_page is required',
            'end_page.int'      => 'A end_page should be integer',
            'end_page.min'      => 'A end_page should be greater than one',
            'end_page.gte'      => 'A end_page should greater than or equal to start_page',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'    => 400,
            'message'   => 'fail (validation errors)',
            'data'      => $validator->errors()
        ]));
    }
}
