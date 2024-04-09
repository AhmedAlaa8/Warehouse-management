<?php

namespace App\Rules\Cart;

use Illuminate\Contracts\Validation\Rule;

class PositiveRule implements Rule
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
            if($singleValue < 1)
            {
                if($attribute == "counts")
                {
                    $this->message = " الكمية ".++$index." اقل من الواحد";
                }
                else if($attribute == "prices")
                {
                    $this->message = " سعر الواحدة ".++$index." اقل من الواحد";
                }
                else if($attribute == "total_prices")
                {
                    $this->message = " السعر الكلي ".++$index." اقل من الواحد";
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
