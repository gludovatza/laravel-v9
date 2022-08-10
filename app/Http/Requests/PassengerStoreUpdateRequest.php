<?php

namespace App\Http\Requests;

use App\Rules\LegalAgeRule;
use App\Rules\PhoneNumberFormatInvokableRule;
use Illuminate\Foundation\Http\FormRequest;

class PassengerStoreUpdateRequest extends FormRequest
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
            'utasneve' => 'required|min:10|max:50',
            'age' => 'required|numeric|min:6|max:99',
            'email' => 'required|email|max:100',
            //'phone' => 'required|max:11|regex:/^\d{2}\/\d{3}\-\d{4}$/',
            'phone' => ['required', 'max:11', new PhoneNumberFormatInvokableRule()],
            'repulojarata' => 'required|integer|exists:flights,id',
            'birthdate' => ['required', new LegalAgeRule(18)]
        ];
    }
}
