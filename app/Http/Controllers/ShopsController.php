<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function index()
    {
        // 主 -> 従
        $area_tokyo = Area::find(1)->shops;
        // dd($area_tokyo);

        // 主 <- 従
        $shop = Shop::find(2)->area->name;

        // 多 対 多
        $routes = Shop::find(1)->routes()->get();
        dd($area_tokyo, $shop, $routes);
    }
}
