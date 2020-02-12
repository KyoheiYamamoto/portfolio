@extends('layouts.admin')
@section('title', '宿泊先一覧')
@section('content')
<div class="container">
    <div class="row">
        <h2>宿泊先一覧</h2>
    </div>
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
            @foreach($posts as $portfolios)
            <div class='content-box'>
                <div class="form-group row">
                    <label class="col-md-2" for="title">宿名</label>
                    <div class="col-md-10">
                        {{ $portfolios->title }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">wifi</label>
                    <div class="col-md-10">
                        {{ $portfolios->presence }}
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-md-2" for="body">レビュー</label>
                    <div class="col-md-10">
                        {{ $portfolios->body }}
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-md-2" for="body">設備・備品</label>
                    <div class="col-md-10">
                        {{ $portfolios->amenities }}
                    </div>
                </div>
                @if ($portfolios->image_path1)
                <div class="form-group img-content">
                     <img src="{{ asset('storage/image/' . $portfolios->image_path1) }}"
                        alt="image" class="img-size" />
                </div>
                @endif
                @if ($portfolios->image_path2)
                <div class="form-group img-content">
                     <img src="{{ asset('storage/image/' . $portfolios->image_path2) }}"
                        alt="image" class="img-size" />
                </div>
                @endif
                @if ($portfolios->image_path3)
                <div class="form-group img-content">
                     <img src="{{ asset('storage/image/' . $portfolios->image_path3) }}"
                        alt="image" class="img-size" />
                </div>
                @endif
                <!-- カルーセル表記 -->
               <section class="carousel" aria-label="Gallery">
                <ol class="carousel__viewport">
                  <li id="carousel__slide1"
                      tabindex="0"
                      class="carousel__slide">
                    <div class="carousel__snapper">
                      <a href="#carousel__slide3"
                         class="carousel__prev">Go to last slide</a>
                      <a href="#carousel__slide2"
                         class="carousel__next">Go to next slide</a>
                    </div>
                  </li>
                  <li id="carousel__slide2"
                      tabindex="0"
                      class="carousel__slide">
                    <div class="carousel__snapper"></div>
                    <a href="#carousel__slide1"
                       class="carousel__prev">Go to previous slide</a>
                    <a href="#carousel__slide3"
                       class="carousel__next">Go to next slide</a>
                  </li>
                  <li id="carousel__slide3"
                      tabindex="0"
                      class="carousel__slide">
                    <div class="carousel__snapper"></div>
                    <a href="#carousel__slide2"
                       class="carousel__prev">Go to previous slide</a>
                    <a href="#carousel__slide1"
                       class="carousel__next">Go to first slide</a>
                  </li>
                </ol>
                <!-- 下の丸い部分のところ-->
                <aside class="carousel__navigation">
                  <ol class="carousel__navigation-list">
                    <li class="carousel__navigation-item">
                      <a href="#carousel__slide1"
                         class="carousel__navigation-button">Go to slide 1</a>
                    </li>
                    <li class="carousel__navigation-item">
                      <a href="#carousel__slide2"
                         class="carousel__navigation-button">Go to slide 2</a>
                    </li>
                    <li class="carousel__navigation-item">
                      <a href="#carousel__slide3"
                         class="carousel__navigation-button">Go to slide 3</a>
                    </li>
                  </ol>
                </aside>
              </section>
                <div class="form-group row">
                    <label class="col-md-2">評価</label>
                    <div class="col-md-10">
                        {{ $portfolios->star }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="body">住所</label>
                    <div class="col-md-10">
                        {{ $portfolios->address }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="body">URL・電話番号</label>
                    <div class="col-md-10">
                        {{ $portfolios->tel }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
</div>