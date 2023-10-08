<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>「ぼやき」をみつけよう / Boyaitter</title>
    <!-- Material Design for Bootstrap 読み込み 開始 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" defer></script>
    <!-- Material Design for Bootstrap 読み込み 終了 -->
</head>
<body class="vh-100">
    <div class="row">
        <div class="d-none d-lg-block col-lg-5">
            <img src="{{ asset('img/top.png') }}" alt="" class="w-100 vh-100" style="object-fit: cover;">
        </div>
        <div class="col-12 col-lg-7">
            <div class="vh-100 d-flex flex-column justify-content-center px-4 px-lg-0">
                <img src="/img/logo.png" alt="" style="width: 60px;" class="mt-5 mb-4">
                <h1 class="font-weight-bold mb-4" style="font-size: 56px;">全てのぼやきが、ここに。</h1>
                <p class="fs-3 font-weight-bold">Boyaitterをはじめよう</p>
                <div>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <div class="mb-6">
                                    <a href="{{ route('tweets.index') }}"  class="btn btn-primary btn-rounded font-weight-bold btn-lg" style="width: 200px;">
                                        つぶやきを見る
                                    </a>
                                </div>
                            @else
                                @if (Route::has('register'))
                                    <div class="mb-6">
                                        <a href="{{ route('register') }}"  class="btn btn-primary btn-rounded font-weight-bold btn-lg shadow-1" style="width: 200px;">
                                            メールアドレスで登録
                                        </a>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-weight-bold mb-2">アカウントをお持ちの場合</p>
                                    <div class="mb-2">
                                        <a href="{{ route('login') }}"  class="btn btn-outline-primary btn-rounded font-weight-bold btn-lg" style="width: 200px;">
                                            ログイン
                                        </a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>