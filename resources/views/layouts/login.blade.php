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
        <div class = "logo">
          <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"  width="60" height="45"></a></h1>
        </div>
        <div class="header-menu">
          <div class="header-user">
          <p>{{ Auth::user()->username}}さん</p>
          </div>
          <div class="accordion"></div>
            <div class="accordion-contents">
              <a href="/top">HOME</a>
              <a href="/profile/{{Auth::user()->id}}/edit">プロフィール編集</a>
              <a href="/logout">ログアウト</a>
            </div>
            <img src="{{ asset('storage/images/'.Auth::user()->images) }}" width="40" height="40">
          </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
              <div class="side-user">
                <p>{{ Auth::user()->username}}さんの</p>
              </div>
              <div class="ff">
                <p>フォロー数</p>
                <p>{{Auth::user()->following()->count()}}名</p>
              </div>
              <div class="ff-btn">
                <button type="submit" class="sidebtn"><a href="/follow-list">フォローリスト</a></button>
              </div>
              <div class="ff">
                <p>フォロワー数</p>
                <p>{{Auth::user()->followed()->count()}}名</p>
              </div>
              <div class="ff-btn">
                <button type="submit" class="sidebtn"><a href="/follower-list">フォロワーリスト</a></button>
              </div>
            <div class="s-btn">
            <button type="submit" class="search-btn"><a href="/search">ユーザー検索</a></button>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/script.js') }} "></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
