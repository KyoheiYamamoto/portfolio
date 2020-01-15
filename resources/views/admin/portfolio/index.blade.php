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
            <div class="list-portfolios col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">宿泊先一覧</th>
                                <th width="20%">宿名</th>
                                <th width="50%">Wifi、価格、場所</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $portfolios)
                                <tr>
                                    <th>{{ $portfolios->id }}</th>
                                    <td>{{ \Str::limit($portfolios->title, 100) }}</td>
                                    <td>{{ \Str::limit($portfolios->body, 250) }}</td>
                                    <td>
                                      <div>
                                            <a href="{{ action('Admin\portfolioController@edit', ['id' => $portfolios->id]) }}">編集</a>
                                        </div>
                                         <div>
                                            <a href="{{ action('Admin\portfolioController@delete', ['id' => $portfolios->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection