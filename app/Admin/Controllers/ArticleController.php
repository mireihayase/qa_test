<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Category;
use App\Coin;
use App\Fund;
use App\Tag;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public $data;

    use HasResourceActions;
    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    public function main_editor($id) {
        $this->data['article'] = Article::find($id);

        return view('admin/main_editor', $this->data);
    }

    public function save_content(Request $request, $id) {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        $article->save();
        $category_name_array = self::getCategoriesName();
        $this->data['category_name_array'] = $category_name_array;

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

        return view('admin/preview', $this->data);
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->id('Id');
        $grid->title('Title');
        $grid->description('description');
        $grid->body('body')->limit(10);
        $grid->thumbnail('thumbnail');
        $grid->category()->display(function ($category) {
            return "<span class='label label-success'>{$category['name']}</span>";
        });
        $grid->tags()->display(function ($tag) {
            $tag = array_map(function ($tag) {
                return "<span class='label btn-twitter'>{$tag['name']}</span>";
            }, $tag);
            return join('&nbsp;', $tag);
        });
        $grid->status('status');
        $grid->related_articles('related_articles');
        $grid->type('type');
        $grid->deleted_at('Deleted at');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->category('Category');
        $show->fund('Fund');
        $show->tags('tags');
        $show->status('status');
        $show->related_articles('related_articles');
        $show->type('type');
        $show->deleted_at('Deleted at');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $form = new Form(new Article);

        $form->text('title', 'Title');
        $form->text('body', 'Body');
        $form->text('description', 'Description');
        $form->text('thumbnail', 'thumbnail');
        $form->slider('type')->options(['max' => 2, 'min' => 0]);
        $form->select('category_id', 'Category')->options($categories);
        $form->multipleSelect('tags')->options($tags);
        $form->slider('status')->options(['max' => 2, 'min' => 0]);
        $form->text('related_articles', 'related_articles');
        $form->datetime('created_at', 'created_at');
        return $form;
    }
}
