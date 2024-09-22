@extends('adminlte::page')

@section('title', 'ホーム')

@section('content_header')
    <h1>ようこそ、{{ $userName }}様。</h1> <!-- ユーザー名を表示 -->
@stop

@section('content')
    @if ($newItemMessage)
        <div class="alert alert-success">
            {{ $newItemMessage }} <!-- 新規商品メッセージを表示 -->
        </div>
    @endif

    <div class="mt-3">
        @if (auth()->user()->role == 1) <!-- 管理者（role = 1）なら表示 -->
            <a href="{{ url('user') }}" class="btn btn-info">ユーザー情報を管理</a> <!-- ユーザー情報へのリンク -->
        @endif
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
