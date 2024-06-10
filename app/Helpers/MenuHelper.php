<?php

namespace App\Helpers;

use App\Models\Stock;

class MenuHelper
{
    public static function getStockQuantity($menuId)
    {
        $stock = Stock::where('menu_id', $menuId)->first();
        return $stock ? $stock->quantity : 0;
    }
}