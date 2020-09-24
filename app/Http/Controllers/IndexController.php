<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {
    public $data;

    public function btc() {
        $ua = self::isMobile();
        $this->data['ua'] = $ua;
        return view('index/btc', $this->data);
    }

    public function terms() {
        return view('index/terms_use');
    }

    public function privacy() {
        return view('index/terms_privacy');
    }
}
