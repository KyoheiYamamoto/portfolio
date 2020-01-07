{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'宿泊先一覧<'を埋め込む --}}
@section('title', '宿泊先一覧<')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>宿泊先一覧</h2>
            </div>
        </div>
    </div>
@endsection

