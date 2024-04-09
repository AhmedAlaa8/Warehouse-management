<?php

if(!function_exists("getUserTypes"))
{
    function getUserTypes()
    {
        return [
            'supplier' => [
                'ar' => "مورد",
                'color' => "#FFD449"
            ],
            'doctor' => [
                'ar' => "دكتور",
                'color' => "#FFECCC"
            ],
            'student' => [
                'ar' => "طالب",
                'color' => "#C8D6AF"
            ],
        ];
    }
}