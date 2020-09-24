<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public $data;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // top 表示
//        $ids_array = [62,57,76,64,59];
//        $ids_order = implode(',', $ids_array);
//        $display_articles = Article::whereIn('id', $ids_array)->orderByRaw("FIELD(id, $ids_order)")->get();
//        $this->data['display_articles'] = $display_articles;

        $articles = Article::where('status', 2)->orderBy('created_at','desc')->get();
        $this->data['articles'] = $articles;

        return view('articles/index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $article = Article::where('id', $id)->whereIn('status',[1,2])->first();
        if(empty($article)) {
            return redirect('/');
        }

        preg_match_all('/class=\"headline\">(.*?)<\//s', $article->body, $headline_class);
        if (empty($headline_class[1])) {
            preg_match_all('/<h2.*?>.+?<\/h2>/u', $article->body, $h2_array);

            $headline_array = [];
            $h2_count = 0;
            $body = $article->body;
            foreach ($h2_array[0] as $h2) {
                preg_match('/<h2>(.+?)<\/h2>/', $h2, $headline);
                $headline_array[] = $headline[1];
                $h2_count += 1;
                $h2_replace = '<h2 id="' . $h2_count . '">' . $headline[1] . '</h2>';
                $body = str_replace($h2, $h2_replace, $body);
            }
        }else {
            $headline_array = $headline_class[1] ;
            $headline_count = 0;
            $body = $article->body;
            foreach ($headline_class[0] as $headline_content) {
                preg_match('/class=\"headline\">(.*?)<\//s', $headline_content, $headline);
                $headline_count += 1;
                $headline_replace = 'class="headline" id="' . $headline_count . '">' . $headline[1] . '</';
                $body = str_replace($headline_content, $headline_replace, $body);
            }
        }
        $this->data['headline_array'] = $headline_array;
        $article->body = $body;
        $this->data['article'] = $article;

        if(!empty($article['related_articles'])) {
            $related_articles_ids = explode(",", $article['related_articles']);
            $related_articles = Article::whereIn('id', $related_articles_ids)->get();
            $this->data['related_articles'] = $related_articles;
        }

        if(!empty($article['related_coins'])) {
            $related_coins_ids = explode(",", $article['related_coins']);
            $this->data['related_coins'] = $related_coins;
        }

        return view('articles/show', $this->data);
    }

}
