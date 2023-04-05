<?php

declare(strict_types=1);

namespace App\Http\Requests\Posts;

use App\Enums\Theme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'user_id' => ['requited', 'int'],
            'title' => ['string', 'min:2', 'max:190'],
            'description' => ['string', 'min:2', 'max:255'],
            'text' => ['required', 'min:5'],
            'health' => ['string', 'min:2', 'max:255'],
            'mood' => ['string', 'min:2', 'max:255'],
            'kg' => ['int', 'min:0', 'max:200' ],
            'gr' => ['int', 'min:0', 'max:999'],
            'ht' => ['int', 'min:0', 'max:220'],
            'year' => ['int', 'min:0', 'max:90'],
            'month' => ['int', 'min:0', 'max:11'],
            'theme' => ['required', new Enum(Theme::class)],
        ];
    }
}