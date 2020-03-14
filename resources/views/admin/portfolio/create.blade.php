@extends('layouts.admin')
@section('title', '宿泊先登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>宿泊先の投稿</h2>
                <form action="{{ action('Admin\portfolioController@create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" for="title">宿名
                            <p class="hissu">※正式名称で記入してください</p></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">wifiの有無</label>
                        <div class="col-md-4 form-check radio-inline">
                            <!---->
                            <input type="radio" class="form-check-input" name="presence" id="yes" value='有'
                                {{ old('presence','yes') == '有' ? 'checked' : '' }} checked="checked">
                            <label class="form-check-label" for="yes">有</label>
                        </div>
                        <div class="col-md-4 form-check radio-inline">
                            <input type="radio" class="form-check-input" name="presence" id="no" value='無'
                                {{ old('presence','no') == '無' ? 'checked' : '' }}>
                            <label class="form-check-label" for="no">無</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="body">レビュー<br><p class="hissu">※必ず記入してください</p></label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="body">設備・備品<br><p class="hissu">※必ず記入してください</p></label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="amenities" rows="20">{{ old('amenities') }}</textarea>
                        </div>
                    </div>
                    <label class="col-md-7" for="body">評価<br><p class="hissu">※必ず記入してください</p></label>
                    <div class="stars">
                        <input id="star5" type="radio" name="star" value="5" />
                        <label for="star5">★</label>
                        <input id="star4" type="radio" name="star" value="4" />
                        <label for="star4">★</label>
                        <input id="star3" type="radio" name="star" value="3" />
                        <label for="star3">★</label>
                        <input id="star2" type="radio" name="star" value="2" />
                        <label for="star2">★</label>
                        <input id="star1" type="radio" name="star" value="1" />
                        <label for="star1">★</label>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="title">画像<br><p class="hissu">※必ず1枚はアップロードをしてください(2MB以下)</p></label>
                        <div class="col-md-10">

                        <!-- 1枚目の画像 -->

                        <input type="file" class="form-control-file" name="image1">
                        <!-- CSS -->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css" rel="stylesheet" type="text/css" media="all"/>
                        <!-- JS -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.js"></script>

                            <!-- 切り抜きボタン -->
                            <a id="getData" class="btn btn-primary">Get Data</a>
                            <br><br>
                                <div class="cropper-example-1">
                                <!-- bladeテンプレートを使用していれば asset()や url() 関数が使えます -->
                                <img id="img" class="img-responsive" src="./img/art.jpg" alt="">
                                </div>
                                    <script type="text/javascript">
                                        // init
                                        // class='cropper-example-1のimgタグに適用'
                                        var $image = $('.cropper-example-1 > img'),replaced;
                                        //crop option
                                        $('#img').cropper({
                                        aspectRatio: 4 / 4 // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
                                        });
                                    </script>

                            <!--2枚目の画像 -->
                            <input type="file" class="form-control-file" name="image2">
                            <!-- CSS -->
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css" rel="stylesheet" type="text/css" media="all"/>
                            <!-- JS -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.js"></script>

                            <!-- 切り抜きボタン -->
                            <a id="getData" class="btn btn-primary">Get Data</a>
                            <br><br>
                                <div class="cropper-example-1">
                                <!-- bladeテンプレートを使用していれば asset()や url() 関数が使えます -->
                                <img id="img" class="img-responsive" src="./img/art.jpg" alt="">
                                </div>
                                    <script type="text/javascript">
                                        // init
                                        // class='cropper-example-1のimgタグに適用'
                                        var $image = $('.cropper-example-1 > img'),replaced;
                                        //crop options
                                        // id='imgに適用'
                                        $('#img').cropper({
                                        aspectRatio: 4 / 4 // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
                                        });
                                    </script>

                        <!-- 3枚目の画像 -->
                        <input type="file" class="form-control-file" name="image3">
                        <!-- CSS -->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css" rel="stylesheet" type="text/css" media="all"/>
                        <!-- JS -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.js"></script>

                            <a id="getData" class="btn btn-primary">Get Data</a>
                            <br><br>
                                <div class="cropper-example-1">
                                <!-- bladeテンプレートを使用していれば asset()や url() 関数が使えます -->
                                <img id="img" class="img-responsive" src="./img/art.jpg" alt="">
                                </div>
                                    <script type="text/javascript">
                                        // init
                                        // class='cropper-example-1のimgタグに適用'
                                        var $image = $('.cropper-example-1 > img'),replaced;
                                        //crop options
                                        // id='imgに適用'
                                        $('#img').cropper({
                                        aspectRatio: 4 / 4 // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
                                        });
                                    </script>

                                 </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="title">住所</label>
                        <div class="col-md-10">
                            <textarea name="address" cols="50" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="title">URL</label>
                        <div class="col-md-10">
                            <textarea name="tel" cols="50" rows="3"></textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                <section class="l-section l-section--backToTop">
                <div class="m-backToTop">
                  <a href="{{ action('Admin\portfolioController@index') }}" class="m-button m-button--back">BACK TO TOP</a>
                </div>
             </section>
            </div>
        </div>
    </div>
@endsection
