<?php

if(!function_exists("getStoreTypes"))
{
    function getStoreTypes()
    {
        return [
            'store' => [
                'ar' => "مخزن",
                'color' => "#FFD449"
            ],
            'shop' => [
                'ar' => "محل",
                'color' => "#A8D5E2"
            ],
        ];
    }
}

if(!function_exists("getOrderTypes"))
{
    function getOrderTypes()
    {
        return [
            'sell' => [
                'ar' => "بيع",
                'color' => "#FFD449"
            ],
            'buy' => [
                'ar' => "شراء",
                'color' => "#A8D5E2"
            ],
            'return' => [
                'ar' => "مرتجع",
                'color' => "#A8D5E2"
            ],
        ];
    }
    
}

if (!function_exists('getTypesInString')) {
    function getTypesInString($data)
    {
        return implode(",", array_keys($data));
    }
}

