<?php

namespace App\Http\Requests\Photos;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['int'],
            'title' => ['string', 'min:2', 'max:190', 'nullable'],
            'desc' => ['string', 'min:2', 'max:255', 'nullable'],
            'url' => ['string'],
            'position' => ['boolean', 'required'],
        ];
    }
}
