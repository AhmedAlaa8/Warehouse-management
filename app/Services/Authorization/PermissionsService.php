<?php

namespace App\Services\Authorization;

use App\Models\Permission;

class PermissionsService
{
    const TABLES = [
        'store' => 'المخزن',
        'productStore' => 'مخزن المنتجات',
        'category' => 'التصنيفات',
        'product' => 'المنتجات',
        'unit' => 'الوحدات',
        'productUnit' => 'وحدات المنتجات',
        'supplier' => 'المورد',
        'productDetail' => 'تفاصيل المنتجات',
        'cart' => 'عربة التسوق',
        'orderDetail' => 'تفاصيل الاوردر',
        'company' => 'الشركات',
        'user' => 'المستخمين',
        'order' => 'الاوردارات',
        'userProfile' => 'الصفحة الشخصية للمستخدم',
        'transaction' => 'التحويلات',
        'role' => 'الادوار',
    ];

    public function tablesPermission()
    {
        $data = [];
        foreach (self::TABLES as $table => $arTable)
        {
            $data [$arTable]= [
                [
                    'name' => "r-" . $table,
                    'display_name' => "read $table",
                    'description' => "can read $table from dashboard", 
                ],
                [
                    'name' => "c-" . $table,
                    'display_name' => "create $table",
                    'description' => "can create $table from dashboard", 
                ],
                [
                    'name' => "u-" . $table,
                    'display_name' => "update $table",
                    'description' => "can update $table from dashboard", 
                ],
                [
                    'name' => "d-" . $table,
                    'display_name' => "delete $table",
                    'description' => "can delete $table from dashboard", 
                ],
            ];
        }

        return $data;
    }

    public function seedPermissions()
    {
        foreach($this->tablesPermission() as $tablePermissions)
        {
            foreach($tablePermissions as $tablePermission)
            {
                Permission::updateOrCreate([
                    'name' => $tablePermission['name']
                ],[
                    'display_name' => $tablePermission['display_name'],
                    'description' => $tablePermission['description']
                ]);
            }
        }
    }
}