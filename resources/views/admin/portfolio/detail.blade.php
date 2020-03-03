@extends('layouts.admin')
@section('title', '宿泊先詳細')
@section('content')
    <div class="container">
                <div class="row">
                    <h2>〇〇</h2>
                    <ul class="header-navigation">
                        <li><a href="http://127.0.0.1:8000/admin/portfolio/">TOP</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="https://forms.gle/X35ZU2fz9jBxLhjU7">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class='content-box'>
                            <div class="form-group row">
                                <label class="col-md-2" for="title">宿名</label>
                                <div class="col-md-10">
                                    {{ $portfolio->title }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">wifi</label>
                                <div class="col-md-10">
                                    {{ $portfolio->presence }}
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-2" for="body">レビュー</label>
                                <div class="col-md-10">
                                    {{ $portfolio->body }}
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-2" for="body">設備・備品</label>
                                <div class="col-md-10">
                                    {{ $portfolio->amenities }}
                                </div>
                            </div>
                            <!-- カルーセル表記 -->
                            <div class="form-group row">
                                <label class="col-md-2">評価</label>
                                <div class="col-md-10">
                                    {{ $portfolio->star }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="body">住所</label>
                                <div class="col-md-10">
                                    {{ $portfolio->address }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="body">URL・電話番号</label>
                                <div class="col-md-10">
                                    {{ $portfolio->tel }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider">
                        @if ($portfolio->image_path1)
                        <div class="img-content">
                            <img src="{{ asset('storage/image/' . $portfolio->image_path1) }}" alt="image" class="img-size" />
                        </div>
                        @endif
                        @if ($portfolio->image_path2)
                        <div class="img-content">
                            <img src="{{ asset('storage/image/' . $portfolio->image_path2) }}" alt="image" class="img-size" />
                        </div>
                        @endif
                        @if ($portfolio->image_path3)
                        <div class="img-content">
                            <img src="{{ asset('storage/image/' . $portfolio->image_path3) }}" alt="image" class="img-size" />
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <section class="l-section l-section--backToTop">
                <div class="m-backToTop">
                  <a href="https://pas-pol.jp" class="m-button m-button--back">BACK TO TOP</a>
                </div>
             </section>
            <div class="l-footerNav">
                <div class="l-container l-container--full">
                    <nav class="m-navigation m-navigation--center">
                        <ul>
                            <li>TOP</a></li>
                            <li>PRODUCT</a></li>
                            <li>ABOUT</a></li>
                            <li>NEWS</a></li>
                            <li><a href="https://forms.gle/X35ZU2fz9jBxLhjU7">お問い合わせ</a>
                            </li>
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
