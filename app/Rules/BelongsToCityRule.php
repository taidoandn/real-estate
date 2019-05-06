<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\City;

class BelongsToCityRule implements Rule
{
    protected $field;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($field)
    {
        $this->field = $field;
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
        $field_value = request()->get($this->field);
        return !! City::find($field_value)->districts->contains('id',$value);
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The value of :attribute field  didn\'t belongs to the '.$this->field.' field';
    }
}
