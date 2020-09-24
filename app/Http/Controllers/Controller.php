<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isMobile() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $ua = '';
        // user agent が iPhone か iPod か Android の場合
        if( (strpos($user_agent,'iPhone') !== false) || (strpos($user_agent,'iPod') !== false) || (strpos($user_agent,'Android') !== false) ) {
            $ua = 'sp';
        }

        return $ua;
    }

    public function getCategoriesName() {
        $ids_array = [3, 2, 1, 4, 7];
        $ids_order = implode(',', $ids_array);
        $category_names = Category::whereIn('id', $ids_array)->orderByRaw("FIELD(id, $ids_order)")->pluck('name');

        return $category_names;
    }
}
