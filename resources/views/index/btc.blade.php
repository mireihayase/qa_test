<!DOCTYPE html>
<html lang="ja">
<head>
    @include('include/head')
    <title>ChainScape</title>
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
        <li><a href="/btc">BTCニュース</a></li>
        <li><a href="/coins">トークン</a></li>
      </ul>
    </nav>
	</header>
	<!-- ヘッダー終了 -->
	<!-- コンテンツ開始 -->
    <article id="content">
        <section id="detail" class="clearfix">
            <div class="detail_wrap clearfix">
                <div class="desc clearfix ">

                @if($ua != 'sp')
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_c9464"></div>
                        <div class="tradingview-widget-copyright">TradingView提供の<a href="https://jp.tradingview.com/symbols/BITFLYER-BTCJPY/" rel="noopener" target="_blank"><span class="blue-text">BTCJPYチャート</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">

                            new TradingView.widget(
                                {
                                    "width": 640,
                                    "height": 400,
                                    // "autosize": true,
                                    "symbol": "BITFLYER:BTCJPY",
                                    "interval": "D",
                                    "timezone": "exchange",
                                    "theme": "light",
                                    "style": "1",
                                    "locale": "ja",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "allow_symbol_change": true,
                                    "container_id": "tradingview_c9464"
                                }
                            );
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                @else
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div id="tradingview_bc696"></div>
                            <div class="tradingview-widget-copyright">TradingView提供の<a href="https://jp.tradingview.com/symbols/BITFLYER-BTCJPY/" rel="noopener" target="_blank"><span class="blue-text">BTCJPYチャート</span></a></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            <script type="text/javascript">
                                new TradingView.widget(
                                    {
                                        "width": 350,
                                        "height": 400,
                                        "symbol": "BITFLYER:BTCJPY",
                                        "interval": "D",
                                        "timezone": "exchange",
                                        "theme": "light",
                                        "style": "1",
                                        "locale": "ja",
                                        "toolbar_bg": "#f1f3f6",
                                        "enable_publishing": false,
                                        "hide_top_toolbar": true,
                                        "container_id": "tradingview_bc696"
                                    }
                                );
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                @endif

                </div>
            </div>
        </section>
    </article>
	<!-- コンテンツ終了 -->
    @include('include/footer')
</div>
</body>
</html>