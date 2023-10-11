<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class Exhibition implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exhibition_end_date = Carbon::parse(request()->exhibition_end_date);
        $start_date = Carbon::parse($value);
        if (request()->enable_exhibition == 'NO') {
            return true;
        }

        if ($start_date->gt($exhibition_end_date)) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Start date must be after exhibition end date';
    }
}
