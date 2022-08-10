<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PhoneNumberFormatInvokableRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if( ! preg_match('/^\d{2}\/\d{3}\-\d{4}$/', $value)) {
            $fail('validation.phone_format')->translate();
        }
    }
}
