<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin: 20px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
        <link rel="stylesheet" href="/bower_components/trumbowyg/dist/ui/trumbowyg.css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    記事の編集<br>
                    画像タグ　　
                    &lt;p class="center_img">&lt;img src="https://image.chainscape.co/{{$article->id}}/" alt=""&gt;&lt;/p><br>
                    h2タグの中にstyleなどを入れないこと。&lt;br>や&lt;span>などを含まないように。　　&lt;h2>&lt;/h2>  <br>
                </div>
            <form action="/admin/article_editor/{{$article->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
                <input type="text" id="title" name="title" value="{{($article->title)}}" class="form-control title">
                <textarea id="trumbowyg" name="body" >
                    {{$article->body}}
                </textarea>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
            </form>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
                <script src="/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>
                {{--<script src="/bower_components/trumbowyg/dist/plugins/colors/trumbowyg.colors.js"></script>--}}
                <script src="/bower_components/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>
                <script src="/bower_components/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css"></script>


                <script>
                    $('#trumbowyg').trumbowyg({
                            btns: [
                                ['viewHTML'],
                                ['undo', 'redo'],
                                ['formatting'],
                                ['strong', 'em', 'del'],
                                ['foreColor', 'backColor'],
                                ['link'],
                                ['insertImage'],
                                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                                ['unorderedList', 'orderedList'],
                                ['horizontalRule'],
                                ['removeformat'],
                                ['fullscreen'],
                                ['align']
                            ],
                        resetCss: true
                    });
                </script>

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    </body>
</html>
