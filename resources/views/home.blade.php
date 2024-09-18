@extends('adminlte::page')

@section('title', 'ホーム')

@section('content_header')
    <h1>ようこそ、{{ $userName }}様。</h1> <!-- ユーザー名を表示 -->
@stop


    @if ($newItemMessage)
        <div class="alert alert-success">
            {{ $newItemMessage }} <!-- 新規商品メッセージを表示 -->
        </div>
    @endif

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
