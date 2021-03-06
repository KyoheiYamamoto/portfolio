@extends('layouts.admin')
@section('title', '宿泊先一覧')
@section('content')
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <h2>Barato</h2>
        <p class="subtitle">5000円以下で見つかる宿さがし</p>
        <ul class="header-navigation">
            <li><a href="{{ action('Admin\portfolioController@index') }}">TOP</a></li>
            <li><a href="#">About</a></li>
            <li><a href="{{ action('Admin\portfolioController@index','#hotel') }}">HOTEL</a></li>
            <li><a href="{{ action('Admin\portfolioController@index','#news') }}">NEWS</a></li>
            <li><a href="https://forms.gle/X35ZU2fz9jBxLhjU7">Contact</a>
            </li>
        </ul>
    </div>
    <div class="containers">
        <div class="boxs">
    <h4 class="m-concept-title m-concept--index">
        新しい宿さがし
        <span style="letter-spacing:-20px;">。</span>
    </h4>
            <div class="m-concept-read m-concept-read--index">
                <p>世界中の宿へ
                    <br>安く手軽に探せる。
                    <br>探しているだけでわくわくする。
                </p>
                <p>ゲストハウスやホテルを
                <br>手軽で探せるサービス </p>
                    <p class="m-concept-siteLogo">Barato</p>
                    <p>それは、自分と世界を広がる
                        <br>宿との出会いができるサービス
                    </p>
            </div>
        </div>
    </div>
    <canvas class="background"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\portfolioController@add') }}" role="button" class=" btn-primaryi">新規作成する</a>
        </div>
        <div class="col-md-8">
            <form action="{{ action('Admin\portfolioController@index') }}" method="get">
                <div class="form-group row">
                <div id ="hotel"></div>
                    <label class="col-md-2">宿名</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                    </div>
                    <div class="col-md-9">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primarys" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="rows">
        <div class="col-md-8 mx-auto">
            <div class="flexbox">
            @foreach($posts as $portfolios)
                <div class="item">
                    <div class='content-boxs'>
                        <div class="form-group row">
                            @if ($portfolios->image_path1)
                            <div class="img-contents">
                                <a href="{{ action('Admin\portfolioController@detail', ['id' => $portfolios->id]) }}">
                                <img src="{{ $portfolios->image_path1 }}" alt="image"class="img-size" />
                                </a>
                            </div>
                            @endif
                            <label class="col-md-2" for="title">宿名</label>
                            <div class="col-md-10">
                                <a href="{{ action('Admin\portfolioController@detail', ['id' => $portfolios->id]) }}">
                                {{ $portfolios->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card-contents">
    <h3 id="news"></h3>
        <h3  class="text-title">NEWS</h3>
        <ul class="information-list">
            <li>2020/03/22 Tokyo Guest House Ouji Music Loungeを追加しました</li>
            <li>2020/03/21 カプセルイン札幌を追加しました</li>
            <li>2020/03/20 東京有明BAY HOTELを追加しました</li>
        </ul>
    </div>

    <footer class="l-footer">
        <div class="l-container l-container--narrow">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <p id="page-top"><a href="#wrap">PAGE TOP</a></p>

        <div class="box-social">
                        <h4 class="footer-titles">follow us</h4>
                        <div class="m-shareButtons-item">
                            <a class="m-button m-button--twitter" href="https://twitter.com/davidkyohei" target="_blank" onclick="ga('send', 'event', 'share_twitter', 'click', 'https://pas-pol.jp');"><i class="fab fa-twitter fa-3x" ></i></a>
                        </div>
                        <div class="m-shareButtons-item">
                            <a class="m-button m-button--facebook" href="https://www.facebook.com/share.php?u=https://pas-pol.jp" target="_blank" onclick="ga('send', 'event', 'share_facebook', 'click', 'https://pas-pol.jp');"><i class="fab fa-facebook-square fa-3x"></i></a>
                        </div>
                        <div class="m-shareButtons-item">
                            <a class="m-button m-button--email" href="https://forms.gle/X35ZU2fz9jBxLhjU7" ><i class="fas fa-mail-bulk fa-3x"></i></a>
                        </div>
                    </div>
                <div class="m-copyRight">
                <small>Copyright © All rights Reserved.</small>
            </div>
        </div>
    </footer>
    <div class="l-footerNav">
        <div class="l-container l-container--full">
            <nav class="m-navigation m-navigation--center">
            <ul>
                <li><a href="{{ action('Admin\portfolioController@index') }}">TOP</a></li>
                <li><a href="#">About</a></li>
                <li><a href="{{ action('Admin\portfolioController@index','#hotel') }}">HOTEL</a></li>
                <li><a href="{{ action('Admin\portfolioController@index','#news') }}">NEWS</a></li>
                <li><a href="https://forms.gle/X35ZU2fz9jBxLhjU7">Contact</a>
                </li>
            </ul>
            </nav>
        </div>
    </div>
    @endsection
</div>
