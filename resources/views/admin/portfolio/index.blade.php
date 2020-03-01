@extends('layouts.admin')
@section('title', '宿泊先一覧')
@section('content')
    <div class="container">
                <div class="row">
                    <h2>宿泊先一覧</h2>
                    <ul class="header-navigation">
                        <li><a href="#">TOP</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <h4 class="m-concept-title m-concept--index">
                新しい宿さがし
                <span style="letter-spacing:-20px;">。</span>
                </h4>

                    <div class="m-concept-read m-concept-read--index">
                        <p>世界中の宿へ
                            <br>安く手軽に探せる。
                            <br>探しているだけでわくわくする。
                        </p>
                        <p>それは新しい時代の “宿泊へ”
                        <p>そして、人と人が繋がる
                            <br>こんな時代だからこそ、
                            <br>僕たちは、みんなでひとつのせかいを
                            <br>泊まることで描いていきたい。
                        </p>
                        <p class="m-concept-siteLogo">〇〇</p>
                        <p>それは、自分と世界を広がる
                            <br>宿との出会いができるサービス
                        </p>
                    </div>
                    <canvas class="background"></canvas>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ action('Admin\portfolioController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ action('Admin\portfolioController@index') }}" method="get">
                            <div class="form-group row">
                                <label class="col-md-2">宿名</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                                    </div>
                                <div class="col-md-8">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="検索">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                    <div class="flexbox">
                        @foreach($posts as $portfolios)
                             <div class="item">
                                <div class='content-boxs'>
                                    <div class="form-group row">
                                    @if ($portfolios->image_path1)
                                        <div class="img-contents">
                                            <img src="{{ asset('storage/image/' . $portfolios->image_path1) }}" alt="image" class="img-size" />
                                        </div>
                                        @endif
                                        <label class="col-md-2" for="title">宿名</label>
                                        <div class="col-md-10">
                                            {{ $portfolios->title }}
                                        </div>
                                    </div>
                               </div>
                            </div>
                            @endforeach
                     </div>
                </div>
            </div>
                <div class="card-contents">
                        <h3 class="text-title">NEWS</h3>
                            <ul class="information-list">
                                <li>2017/05/01 2号店がドイツにてオープンしました。</li>
                                <li>2017/04/01 春メニュー提供開始しました。</li>
                                <li>2017/01/01 Batty's Coffee Standオープンしました。</li>
                            </ul>
                </div>
                <div class="l-footerNav">
                    <div class="l-container l-container--full">
                        <nav class="m-navigation m-navigation--center">
                            <ul>
                                <li>TOP</a></li>
                                <li>PRODUCT</a></li>
                                <li>ABOUT</a></li>
                                <li>NEWS</a></li>
                                <li>CONTACT</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <footer class="l-footer">
                    <div class="l-container l-container--narrow">
                        <h1 class="m-siteLogo m-siteLogo--small">
                            <a href="https://pas-pol.jp">PAS-POL -旅のモノづくりブランド-｜TABIPPO</a>
                        </h1>

                        <div class="m-copyRight">
                            <small>Copyright © 2020 PAS-POL -旅のモノづくりブランド-｜TABIPPO All rights reserved.</small>
                        </div>
                    </div>
                </footer>
        @endsection
    </div>
