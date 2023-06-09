<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\Theme;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['string', 'max:255', 'nullable'],
            'age' => ['int', 'min:14', 'max:90', 'nullable'],
            'city' => ['string', 'max:255', 'nullable'],
            'about' => ['string', 'max:255', 'nullable'],
            'waiting' => ['bool'],
            'theme' => [new Enum(Theme::class)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
