@extends('layouts.admin')
@section('title', '宿泊先更新')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>宿泊先の編集</h2>
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
                    <label class="col-md-3" for="title">宿名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{$portfolios_form->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">wifiの有無</label>
                    <div class="col-md-4 form-check radio-inline">
                        <!---->
                        <input type="radio" class="form-check-input" name="presence" id="yes" value='有'
                            {{ old('presence', $portfolios_form->presence) == '有' ? 'checked' : '' }} checked="checked">
                        <label class="form-check-label" for="yes">有</label>
                    </div>
                    <div class="col-md-4 form-check radio-inline">
                        <input type="radio" class="form-check-input" name="presence" id="no" value='無'
                            {{ old('presence',$portfolios_form->presence) == '無' ? 'checked' : '' }}>
                        <label class="form-check-label" for="no">無</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="body">レビュー</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="10">{{ $portfolios_form->body }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="body">設備・備品</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="amenities" rows="10">{{ $portfolios_form->amenities }}</textarea>
                    </div>
                </div>
                <label class="col-md-7" for="body">評価</label>
                <div class="stars">
                    <input id="star5" type="radio" name="star" value="5" {{ old('star',$portfolios_form->star) == '5' ? 'checked' : '' }}/>
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="star" value="4" {{ old('star',$portfolios_form->star) == '4' ? 'checked' : '' }}/>
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="star" value="3" {{ old('star',$portfolios_form->star) == '3' ? 'checked' : '' }}/>
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="star" value="2" {{ old('star',$portfolios_form->star) == '2' ? 'checked' : '' }}/>
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="star" value="1" {{ old('star',$portfolios_form->star) == '1' ? 'checked' : '' }}/>
                    <label for="star1">★</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="title">画像</label>
                    <div class="col-md-10">
                        <!-- 1枚目の画像 -->
                        <input type="file" class="form-control-file" name="image1">
                        <!-- CSS -->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css"
                            rel="stylesheet" type="text/css" media="all" />
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
                                        // id='imgに適用'
                                        $('#img').cropper({
                                        aspectRatio: 3 / 4 // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
                                        });
                        </script>
                        <!--2枚目の画像 -->
                        <input type="file" class="form-control-file" name="image2">
                        <!-- CSS -->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css"
                            rel="stylesheet" type="text/css" media="all" />
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
                                        aspectRatio: 3 / 4 // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
                                        });
                        </script>
                        <!-- 3枚目の画像 -->
                        <input type="file" class="form-control-file" name="image3">
                        <!-- CSS -->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/1.0.0/cropper.min.css"
                            rel="stylesheet" type="text/css" media="all" />
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
                                        aspectRatio: 3 / 4 // ここでアスペクト比の調整 ワイド画面にしたい場合は 16 / 9
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
                <div class="form-group row">
                    <div class="col-md-2">
                        <input type="hidden" name="id" value="{{ $portfolios_form->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
            <div class="row mt-5">
                <div class="col-md-4 mx-auto">
                    <ul class="list-group">
                        @if ($portfolios_form->histories != NULL)
                        @foreach ($portfolios_form->histories as $history)
                        <li class="list-group-item">{{ $history->edited_at }}</li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <section class="l-section l-section--backToTop">
                <div class="m-backToTop">
                    <a href="{{ action('Admin\portfolioController@index') }}" class="m-button m-button--back">BACK TO
                        TOP</a>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
