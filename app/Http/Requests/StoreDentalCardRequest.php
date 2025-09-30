<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDentalCardRequest extends FormRequest
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
            'health_card_id' => 'required|exists:health_cards,id',
            'region' => 'required|string|max:128',
            'division'=> 'required|string|max:128',
            'district'=> 'required|string|max:128',
            'school'=> 'required|string|max:128',
            'designation'=> 'required|string|max:128',
        ];
    }
}
