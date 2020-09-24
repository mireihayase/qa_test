<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public $data;

    public function index() {
//        $ids_array = [1,2];
//        $ids_order = implode(',', $ids_array);
//        $categories = Category::whereIn('id', $ids_array)->orderByRaw("FIELD(id, $ids_order)")->get();

        $categories = Category::all();
        $this->data['categories'] = $categories;

        return view('categories/index', $this->data);
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        $this->data['category'] = $category;
        $articles = $category->articles()->whereIn('status', [1,2])->orderBy('created_at','desc')->get();

        if(empty($articles)) {
            return redirect('/');
        }
        $this->data['articles'] = $articles;

        return view('categories/show', $this->data);
    }
}
