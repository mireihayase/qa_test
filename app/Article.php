<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function fund() {
        return $this->belongsTo('App\Fund');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function coins() {
        return $this->belongsToMany(Coin::class);
    }
}
