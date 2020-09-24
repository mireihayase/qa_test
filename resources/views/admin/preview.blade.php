<!DOCTYPE html>
<html lang="ja">
<head>
    @include('include/head')
    <title>記事編集　{{$article->id}}</title>
</head>
<body>
<div id="wrapper">
	<!-- ヘッダー開始 -->
	<header id="header">
		<div class="wrap">
            <p class="logo_img"><a href="/"><img src="/images/logo.svg" width="236" height="40" alt="ChainScape" /></a></p>
		</div>
    <nav id="navi" class="clearfix">
      <ul class="clearfix">
        <li><a class="current" href="/">新着記事</a></li>
        <li><a href="/funds">クリプトファンド</a></li>
        <li><a href="/coins">トークン</a></li>
      </ul>
    </nav>
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
                    <p class="update">{{$article->created_at->format('Y/m/d')}}</p>
                    <br />
                    <a href="/admin/articles/{{$article->id}}/edit" target="_blank">
                        <span style="color: red; font-size: 3rem;">タイトルを編集する</span>
                    </a><br /><br />
                    <a href="/admin/article_editor/{{$article->id}}">
                        <span style="color: red; font-size: 3rem;">テキストを編集する</span>
                    </a>
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
                        <li><a href="#" target="_blank"><img src="/images/sns_link_08.png" width="80" height="80" alt="twitter" /></a></li>
                        <li><a href="#" target="_blank"><img src="/images/sns_link_09.png" width="80" height="80" alt="facebook" /></a></li>
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

                {{--<div class="article_list clearfix">--}}
                    {{--<h2>こちらの記事もおすすめ</h2>--}}
                    {{--<ul class="list clearfix">--}}
                        {{--<li>--}}
                            {{--<figure class="image"><a href="#"><img src="images/sample_06.png" width="170" height="170" alt="" /></a></figure>--}}
                            {{--<div class="info">--}}
                                {{--<p class="cat cat01">ファンドレポート</p>--}}
                                {{--<p class="name"><a href="#">【Fabric Ventures記事要約】ユーティリティトークンは、ペイメントトークンを超える</a></p>--}}
                                {{--<p class="update">2019.09.04</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<figure class="image"><a href="#"><img src="images/sample_07.png" width="170" height="170" alt="" /></a></figure>--}}
                            {{--<div class="info">--}}
                                {{--<p class="cat cat02">ユーティリティトークン</p>--}}
                                {{--<p class="name"><a href="#">Filecoin　概要</a></p>--}}
                                {{--<p class="update">2019.09.04</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<figure class="image"><a href="#"><img src="images/sample_08.png" width="170" height="170" alt="" /></a></figure>--}}
                            {{--<div class="info">--}}
                                {{--<p class="cat cat03">用語解説</p>--}}
                                {{--<p class="name"><a href="#">レイヤーモデルとは</a></p>--}}
                                {{--<p class="update">2019.09.04</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                    {{--</ul>--}}

                {{--</div>--}}


        </section>





    </article>
	<!-- コンテンツ終了 -->
    @include('include/footer')
</div>
</body>
</html>