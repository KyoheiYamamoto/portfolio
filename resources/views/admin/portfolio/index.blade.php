@extends('layouts.admin')
@section('title', '宿泊先一覧')
@section('content')
<div class="container">
    <div class="row">
        <h2>hoteL</h2>
        <ul class="header-navigation">
            <li><a href="{{ action('Admin\portfolioController@index') }}">TOP</a></li>
            <li><a href="#">About</a></li>
            <li><a href=“#hotel”>HOTEL</a></li>
            <li><a href=“#news”>NEWS</a></li>
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
                <p>新しい時代の "宿泊へ"
                    <p>そして、人と人が繋がる
                        <br>こんな時代だからこそ、
                        <br>僕たちは、みんなでひとつのせかいを
                        <br>
                        <br>泊まることで描いていきたい。
                    </p>
                    <p class="m-concept-siteLogo">〇</p>
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
            <a href="{{ action('Admin\portfolioController@add') }}" role="button" class="btn btn-primary">新規作成する</a>
        </div>
        <div class="col-md-8" id=“hotel”>
            <form action="{{ action('Admin\portfolioController@index') }}" method="get">
                <div class="form-group row">
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
                                <img src="{{ $portfolios->image_path1 }}" alt="image"
                                    class="img-size" />
                                    <!-- <img src="{{ asset('storage/image/' . $portfolios->image_path1) }}" alt="image"
                                    class="img-size" /> -->
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
        <h3 id=“news” class="text-title">NEWS</h3>
        <ul class="information-list">
            <li>2017/05/01 ああああ</li>
            <li>2017/04/01 あああああ</li>
            <li>2017/01/01 あああああ</li>
            <li>2017/05/01 ああああ</li>
            <li>2017/04/01 あああああ</li>
            <li>2017/01/01 あああああ</li><li>2017/05/01 ああああ</li>
            <li>2017/04/01 あああああ</li>
            <li>2017/01/01 あああああ</li><li>2017/05/01 ああああ</li>
            <li>2017/04/01 あああああ</li>
            <li>2017/01/01 あああああ</li><li>2017/05/01 ああああ</li>
        </ul>
    </div>

    <footer class="l-footer">
        <div class="l-container l-container--narrow">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <p id="page-top"><a href="#wrap">PAGE TOP</a></p>
        
            <div class="box-social">
                <h4 class="footer-titles">follow us</h4>
                <div class="m-shareButtons-item">
                    <a class="m-button m-button--twitter" href="https://twitter.com/davidkyohei" target="_blank" onclick="ga('send', 'event', 'share_twitter', 'click', 'https://pas-pol.jp');">Share on Twitter</a>
                </div>
                <div class="m-shareButtons-item">
                    <a class="m-button m-button--facebook" href="https://www.facebook.com/share.php?u=https://pas-pol.jp" target="_blank" onclick="ga('send', 'event', 'share_facebook', 'click', 'https://pas-pol.jp');">Share on Facebook</a>
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
                    <li><a href=“#hotel”>HOTEL</a></li>
                    <li><a href=“#news”>NEWS</a></li>
                    <li><a href="https://forms.gle/X35ZU2fz9jBxLhjU7">お問い合わせ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    @endsection
</div>
