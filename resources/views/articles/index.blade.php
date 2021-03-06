<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>


  @include('include/head')
<title>ChainScape</title>
<meta name="description" content="">
<meta name="keywords" content="">

</head>
<body>
<div id="wrapper">

    @include('include/header')

	<!-- メインイメージ開始 -->
	<div id="main_image">
    <div class="wrap">
      <ul class="slider">
        {{--@foreach($display_articles as $key => $article)--}}
        {{--<li>--}}
          {{--<a href="/articles/{{$article->id}}">--}}
            {{--<figure class="image">--}}
              {{--<img src="https://image.chainscape.co/{{$article->id}}/{{$article->thumbnail}}" alt="{{$article->title}}" width="582" height="360" />--}}
            {{--</figure>--}}
            {{--<p>--}}
              {{--{{$article->title}}--}}
            {{--</p>--}}
          {{--</a>--}}
        {{--</li>--}}
        {{--@endforeach--}}
      </ul>
    </div>
	</div>
	<!-- メインイメージ終了 -->
	<!-- コンテンツ開始 -->
	<article id="content">

    <div class="home_wrap clearfix">

      <div class="article_list clearfix">
        <h2>新着記事一覧</h2>
        <div class="box">
          <ul class="list clearfix">
            @foreach($articles as $key => $article)
            <li>
              <figure class="image">
                <a href="/articles/{{$article->id}}">
                  <img src="https://image.chainscape.co/{{$article->id}}/{{$article->thumbnail}}" alt="{{$article->title}}" width="170" height="170" />
                </a>
              </figure>
              <div class="info">
                <p >
                  <a class="cat cat01" href="/categories/{{$article->category->id}}">{{$article->category->name}}</a>
                </p>
                <p class="name">
                  <a href="/articles/{{$article->id}}">{{$article->title}}</a>
                </p>
                <p class="update">{{$article->created_at->format('Y/m/d')}}</p>
              </div>
            </li>
            
            @endforeach
          </ul>

          <!-- pagenation-->
          {{--<div class="paging-pc pc_disp clearfix">--}}
            {{--<ul class="clearfix">--}}
              {{--<li class="prev"><a href="#">＜</a></li>--}}
              {{--<li><a href="#">1</a></li>--}}
              {{--<li><span class="current">2</span></li>--}}
              {{--<li><a href="#">3</a></li>--}}
              {{--<li><span class="extend">...</span></li>--}}
              {{--<li><a href="#">12</a></li>--}}
              {{--<li class="next"><a href="#">＞</a></li>--}}
            {{--</ul>--}}
          {{--</div>--}}

          {{--<div class="paging sp_disp clearfix">--}}
            {{--<ul class="clearfix">--}}
              {{--<li class="prev"><a href="#">前の記事へ</a></li>--}}
              {{--<li class="next"><a href="#">次の記事へ</a></li>--}}
            {{--</ul>--}}
          {{--</div>--}}

        </div>
        
      </div>
  
  
      {{--<div class="recommend_fund_list clearfix">--}}
        {{--<h2>注目ファンド</h2>--}}
        {{--<ul class="list clearfix">--}}
          {{--@foreach($funds as $fund)--}}
            {{--<li>--}}
              {{--<a href="/funds/{{$fund->id}}">--}}
              {{--<figure class="image">--}}
                {{--<img src="https://image.chainscape.co/{{$fund->id}}/{{$fund->name}}_logo.png" alt="{{$fund->name}}" width="106" height="106"/>--}}
              {{--</figure>--}}
              {{--<p class="name">{{$fund->name}}</p>--}}
              {{--</a>--}}
            {{--</li>--}}
          {{--@endforeach--}}

        {{--</ul>--}}
      {{--</div>--}}


    </div>

	</article>
	<!-- コンテンツ終了 -->
      @include('include/footer')
</div>
</body>
</html>