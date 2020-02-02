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
                    <div class="col-md-2">
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
                            <div class="col-md-2 form-check radio-inline"> <!---->
                                <input type="radio" class="form-check-input" name="presence" id="yes" value='有'{{ old('presence','yes') == '有' ? 'checked' : '' }} checked="checked">
                            <label class="form-check-label" for="yes">有</label>
                        </div>
                        <div class="col-md-2 form-check radio-inline">
                            <input type="radio" class="form-check-input" name="presence" id="no" value='無'{{ old('presence','no') == '無' ? 'checked' : '' }}>
                            <label class="form-check-label" for="no">無</label>
                        </div>
                    </div>
                <div class="form-group row ">
                    <label class="col-md-2" for="body">レビュー</label>
                    <div class="col-md-10">
                        {{ $portfolios->body }}
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