<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestCaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "string|required",
            "steps" => "string|required",
            "expected_results" => "string|required",
            "description" => "string|nullable",
            "priority" => "nullable|in:высокий,средний,низкий",
            "card_number" => "string|required",
            "link_task"=> "string|required",
            "features" => "nullable"
        ];
    }
}
