<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxCharRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $limit;
    public function __construct($limit=250)
    {
        $this->limit = $limit;
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
        // dd(strlen($value));
        return strlen($value) <= $this->limit;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message. This :attribute passed a limit of '.$this->limit;
    }
}