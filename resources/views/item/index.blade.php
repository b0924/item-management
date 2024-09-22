@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>商品一覧</h1>
        <div>
            <form action="{{ route('items.search') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="商品名または詳細で検索" required value="{{ request()->input('query') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">検索</button>
                    </div>
                    <div class="input-group-append">
                        <a href="{{ route('items.index') }}" class="btn btn-secondary">リセット</a>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">編集</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
