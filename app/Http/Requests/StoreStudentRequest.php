<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
        'group_id' => 'nullable|exists:groups,id',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'level' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'parent_name' => 'required|string|max:255',
        'parent_phone' => 'required|string|max:20',
    ];

    }
}
