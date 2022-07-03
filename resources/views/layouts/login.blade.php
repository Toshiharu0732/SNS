<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id= "head">
            <h1><a href="{{ url('top')  }}"><img class="top" src="images/atlas.png"></a></h1>
                    <div class="accordion">
                        <div class="accordion-container">
                         <div class="accordion-item">
                                <h3>{{ Auth::user()->username }}さん
                                </h3>
                                <h3 class="accordion-title js-accordion-title"></h3>
                                <ul class="accordion-content">
                                 <li class="accordion-home"><a class="link-grey" href="/top">HOME</a></li>
                                 <li class="accordion-profile"><a class="link-white" href="/profile">プロフィール編集</a></li>
                                 <li class="accordion-logout"><a class="link-grey" href="/logout">ログアウト</a></li>
                                 </ul>
                                  <img src="images/icon1.png" >
                            </div>
                      </div>
                   </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script src="js/accordion.js"></script>
</body>
</html>
