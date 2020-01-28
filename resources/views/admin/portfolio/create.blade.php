@extends('layouts.admin')
@section('title', '宿泊先登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>宿泊先登録</h2>
                <form action="{{ action('Admin\portfolioController@create') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">Wifi、価格、場所</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                                  <label class="col-md-2" for="title">住所</label>
                                  <div class="col-md-10">
                                    <textarea name="example" cols="10" rows="3"></textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-2" for="title">電話番号</label>
                                <div class="col-md-10">
                                  <textarea name="example" cols="10" rows="3"></textarea>
                               </div>
                            </div>
                          </div>
                    
                    <!--住所や電話番号を追加する 1/19-->
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection