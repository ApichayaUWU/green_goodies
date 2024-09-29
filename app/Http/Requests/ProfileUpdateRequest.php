<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'PhoneNumber' => ['nullable', 'string', 'max:10'],
            'birthday' => ['nullable', 'date', 'before:today'],  // Add validation for birthdate
            // 'profile_photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],  // Validation for profile photo
        ];
    }
}
