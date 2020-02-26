@extends('layouts.admin')
@section('title', '宿泊先一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>宿泊先一覧</h2>
                <form action="{{ action('Admin\portfolioController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">宿名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $portfolios_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-2">wifi</label>
                            <div class="col-md-2 form-check radio-inline"> <!---->
                                <input type="radio" class="form-check-input" name="presence" id="yes" value='有'{{ old('presence','yes') == '有' ? 'checked' : '' }} checked="checked">
                            <label class="form-check-label" for="yes">有</label>
                        </div>
                        <div class="col-md-2 form-check radio-inline">
                            <input type="radio" class="form-check-input" name="presence" id="no" value='無'{{ old('presence','no') == '無' ? 'checked' : '' }}>
                            <label class="form-check-label" for="no">無</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">レビュー</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $portfolios_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">設備・備品</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="amenities" rows="20">{{ $portfolios_form->amenities }}</textarea>
                        </div>
                    </div>
                    <form type="get" action="">
                      <label class="col-md-3" for="body">評価</label>
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
                    </form>
                        <div class="form-group row">
                            <label class="col-md-2" for="image">画像</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file" name="image">
                                <div class="form-text text-info">
                                    設定中: {{ $portfolios_form->image_path }}
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                    </label>
                                </div>
                            </div>
                        </div>
                    <div class="form-group row">
                                  <label class="col-md-2" for="title">住所</label>
                                  <div class="col-md-10">
                                    <textarea name="example" cols="50" rows="3"></textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-2" for="title">電話番号</label>
                                <div class="col-md-10">
                                  <textarea name="example" cols="50" rows="10"></textarea>
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
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($portfolios_form->histories != NULL)
                                @foreach ($portfolios_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>

                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
