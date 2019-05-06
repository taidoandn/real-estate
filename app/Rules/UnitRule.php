<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UnitRule implements Rule
{
    private $field;
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
        if ($field_value ==  'sale') {
            return $value == 'm2' || $value == 'total_area';
        }else{
             return $value == 'month' || $value == 'year';
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected :attribute is invalid.';
    }
}
