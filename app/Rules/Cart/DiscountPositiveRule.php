<?php

namespace App\Rules\Cart;

use Illuminate\Contracts\Validation\Rule;

class DiscountPositiveRule implements Rule
{
    private $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        
        foreach($value as $index => $singleValue)
        {
            if($singleValue < 0)
            {
                
                if($attribute == "discounts")
                {
                    $this->message = " الخصم ".++$index." اقل من الصفر";
                }
               
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
