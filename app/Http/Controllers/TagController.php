<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Fund;
use Illuminate\Http\Request;

class TagController extends Controller {
    public $data;

    public function index() {
        $tags = Tag::all();
        $this->data['tags'] = $tags;

        return view('tags/index', $this->data);
    }

    public function show($id) {
        $funds = Fund::all();
        $this->data['funds'] = $funds;
        $tag = Tag::findOrFail($id);
        $this->data['tag'] = $tag;
        $articles = $tag->articles()->whereIn('status', [1,2])->orderBy('created_at','desc')->get();
        if(empty($articles)) {
            return redirect('/');
        }
        $this->data['articles'] = $articles;

        return view('tags/show', $this->data);
    }
}
