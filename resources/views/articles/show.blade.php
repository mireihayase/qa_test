<!DOCTYPE html>
<html lang="ja">
<head>
    @include('include/head')
    <title>{{$article->title}}</title>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@ChainScape_info" />
    <meta property="og:url"           content="https://chainscape.co/articles/{{$article->id}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$article->title}}" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:site_name" content="ChainScape" />
    <meta property="og:image"         content="https://image.chainscape.co/{{$article->id}}/{{$article->thumbnail}}" />
</head>
<body>
<div id="wrapper">
	<!-- ヘッダー開始 -->
	<header id="header">
		<div class="wrap">
            <p class="logo_img"><a href="/"><img src="/images/logo.svg" width="236" height="40" alt="ChainScape" /></a></p>
		</div>
    {{--<nav id="navi" class="clearfix">--}}
      {{--<ul class="clearfix">--}}
        {{--<li><a class="current" href="/">新着記事</a></li>--}}
        {{--<li><a href="/funds">クリプトファンド</a></li>--}}
        {{--<li><a href="/coins">トークン</a></li>--}}
      {{--</ul>--}}
    {{--</nav>--}}
	</header>
	<!-- ヘッダー終了 -->
	<!-- パンくず開始 -->
	<div id="breadcrumbs">
    <div class="wrap">
      <ul>
        <li><a href="/">HOME</a></li>
          <li><a href="/categories/{{$article->category->id}}">{{$article->category->name}}</a></li>
          @if(!empty($article->tags->first()))
              <li>
                  <a href="/tags/{{$article->tags->first()->id}}">
                      {{$article->tags->first()->name}}
                  </a>
              </li>
          @endif
          <li>{{$article->title}}</li>
      </ul>
    </div>
	</div>
	<!-- パンくず終了 -->
	<!-- コンテンツ開始 -->
    <article id="content">

        <section id="detail" class="clearfix">
            @if(!empty($article->thumbnail))
                <figure class="main_image">
                    <img src="https://image.chainscape.co/{{$article->id}}/{{$article->thumbnail}}" alt="{{$article->title}}" width="750" height="463" />
                </figure>
            @endif
            <div class="detail_wrap clearfix">
                <div class="head clearfix">
                    <p class="">
                        <a class="cat cat01" href="/categories/{{$article->category->id}}">
                            {{$article->category->name}}
                        </a>
                    </p>

                    <h1>{{$article->title}}</h1>
                    <p class="update">
                    @if($article->created_at == $article->updated_at)
                        公開日　{{$article->created_at->format('Y/m/d')}}
                    @else
                        更新日　{{$article->updated_at->format('Y/m/d')}}
                    @endif
                    </p>
                    <span style="display: inline-block; width: 70px;">
                        <a href="https://twitter.com/intent/tweet?text={{$article->title}}%0a&url=https://chainscape.co/articles/{{$article->id}}&via=ChainScape_info" rel=”nofollow” class="twitter-share-button" data-show-count="false" target="_blank">
                            <img src="/images/tweet_btn.png" width="80" height="80" alt="twitter" />
                        </a>
                    </span>
                    <span style="display: inline-block; width: 70px;">
                         <a href="https://www.facebook.com/sharer/sharer.php?u=https://chainscape.co/articles/{{$article->id}}"  target="_blank" rel=”nofollow”>
                            <img src="/images/facebook_btn.png" width="80" height="80" alt="twitter" />
                         </a>
                    </span>
                    <span style="display: inline-block; width: 70px;">
                        <a class="pocket-btn" href="http://getpocket.com/edit?url=https://chainscape.co/articles/{{$article->id}}&title={{$article->title}}" title="Save to Pocket" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                            <img src="/images/pocket_btn.png" width="80" height="80" alt="pocket" />
                        </a>
                    </span>
                </div>

                <div class="desc clearfix">
                    @if(!empty($headline_array))
                        <dl class="table_of_contents">
                            <dt>目次</dt>
                            <dd>
                                <ol>
                                    @for($i= 0; $i < count($headline_array); $i++)
                                        <li>{{$i + 1}}. <a href="#{{$i + 1}}">{{$headline_array[$i]}}</a></li>
                                    @endfor
                                </ol>
                            </dd>
                        </dl>
                    @endif

                    <?php echo $article->body; ?>

                    {{--<div class="box02">--}}
                    {{--<h4>まとめ</h4>--}}
                    {{--<p></p>--}}
                    {{--</div>--}}
                </div>

                @if(!empty($article->tags->first()))
                    <div class="keyword_list clearfix">
                        <h3>この記事に関連するキーワード</h3>
                        <ul class="list">
                            @foreach($article->tags as $tag)
                                <li>
                                    <a href="/tags/{{$tag->id}}">
                                        {{$tag->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="sns_list clearfix">
                    <ul class="list">
                        <li>
                            <a href="https://twitter.com/intent/tweet?text={{$article->title}}%0a&url=https://chainscape.co/articles/{{$article->id}}&via=ChainScape_info" rel=”nofollow” target="_blank">
                                <img src="/images/sns_link_08.png" width="80" height="80" alt="twitter" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://chainscape.co/articles/{{$article->id}}"  target="_blank" rel=”nofollow”>
                                <img src="/images/sns_link_09.png" width="80" height="80" alt="facebook" />
                            </a>
                        </li>
                        {{--<li><a href="#"><img src="/images/sns_link_10.png" width="80" height="80" alt="line" /></a></li>--}}
                    </ul>
                </div>

                {{--<div class="paging clearfix">--}}
                    {{--<ul class="clearfix">--}}
                        {{--<li class="prev"><a href="#">前の記事へ</a></li>--}}
                        {{--<li class="next"><a href="#">次の記事へ</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}

            </div>


            @if(!empty($article['related_articles']))
                <div class="article_list clearfix">
                    <h2>こちらの記事もおすすめ</h2>
                    <ul class="list clearfix">

                        @foreach($related_articles as $related_article)
                        <li>
                            @if(!empty($related_article->thumbnail))
                            <figure class="image">
                                <a href="/articles/{{$related_article->id}}">
                                    <img src="https://image.chainscape.co/{{$related_article->id}}/{{$related_article->thumbnail}}" alt="{{$related_article->title}}" width="170" height="170" />
                                </a>
                            </figure>
                            @endif
                            <div class="info">
                                <p >
                                    <a class="cat cat01" href="/categories/{{$related_article->category->id}}">{{$related_article->category->name}}</a>
                                </p>
                                <p class="name">
                                    <a href="/articles/{{$related_article->id}}">{{$related_article->title}}</a>
                                </p>
                                <p class="update">{{$related_article->created_at->format('Y/m/d')}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif


        </section>





    </article>
	<!-- コンテンツ終了 -->
    @include('include/footer')

    <script>
        $(function () {
            var headerHight = 80; //ヘッダの高さ
            $('a[href^=#]').click(function(){
                var href= $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
                $("html, body").animate({scrollTop:position}, 550, "swing");　//この数値は移動スピード
                return false;
            });
        });
    </script>

</div>
</body>
</html>