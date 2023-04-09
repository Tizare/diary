<?php

declare(strict_types=1);

namespace App\Http\Requests\Posts;

use App\Enums\Theme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'user_id' => [ 'int'],
            'title' => ['string', 'min:2', 'max:190', 'nullable'],
            'description' => ['string', 'min:2', 'max:255', 'nullable'],
            'text' => ['required', 'min:5'],
            'health' => ['string', 'min:2', 'max:255', 'nullable'],
            'mood' => ['string', 'min:2', 'max:255', 'nullable'],
            'kg' => ['int', 'min:0', 'max:200', 'nullable' ],
            'gr' => ['int', 'min:0', 'max:999', 'nullable'],
            'ht' => ['int', 'min:0', 'max:220', 'nullable'],
            'year' => ['int', 'min:0', 'max:90', 'nullable'],
            'month' => ['int', 'min:0', 'max:11', 'nullable'],
            'theme' => ['required', new Enum(Theme::class)],
        ];
    }
}
