<?php

declare(strict_types=1);

namespace App\Http\Requests\Photos;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => ['string', 'min:2', 'max:250', 'nullable'],
            'desc' => ['string', 'min:2', 'max:5000', 'nullable'],
            'url' => ['string'],
            'position' => ['boolean', 'required'],
        ];
    }
}
