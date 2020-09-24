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
    <!-- パンくず開始 -->
        <div id="breadcrumbs">
            <div class="wrap">
                <ul>
                    <li><a href="/">新着記事</a></li>
                    <li><a href="/tags">タグ　一覧</a></li>
                </ul>
            </div>
        </div>
    <!-- パンくず終了 -->
	<!-- コンテンツ開始 -->
	<article id="content">

    <div class="home_wrap clearfix">

      <div class="article_list clearfix" style="margin-top: 20px;">
        <h2>タグ　一覧</h2>
        <div class="box">
          <ul class="list clearfix">
            @foreach($tags as $key => $tag)
            <li>
              <div class="info">

                <p class="name">
                  <a href="/tags/{{$tag->id}}">{{$tag->name}}</a>
                </p>
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