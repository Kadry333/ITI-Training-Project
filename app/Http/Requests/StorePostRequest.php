<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|max:200',
            'created_by'  => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'created_by.required'  => 'Created by is required',
        ];
    }
}

