<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class LegalAgeRule implements Rule
{
    private $legalAge;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($age)
    {
        $this->legalAge = $age;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $formattedValue = new Carbon($value);
        $legalAge = Carbon::now()->subYears($this->legalAge);
        return $formattedValue < $legalAge;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Az utasnak legalább ' . $this->legalAge . ' évesnek kell lennie!';
    }
}
