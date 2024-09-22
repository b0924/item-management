@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">名前</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $item->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">種別</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="ギター" {{ old('type', $item->type) == 'ギター' ? 'selected' : '' }}>ギター</option>
                            <option value="ベース" {{ old('type', $item->type) == 'ベース' ? 'selected' : '' }}>ベース</option>
                            <option value="ドラム" {{ old('type', $item->type) == 'ドラム' ? 'selected' : '' }}>ドラム</option>
                            <option value="マイク" {{ old('type', $item->type) == 'マイク' ? 'selected' : '' }}>マイク</option>
                            <option value="キーボード" {{ old('type', $item->type) == 'キーボード' ? 'selected' : '' }}>キーボード</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">詳細</label>
                        <textarea id="detail" name="detail" class="form-control" required>{{ old('detail', $item->detail) }}</textarea>
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary me-2">更新</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8 d-flex">
                <!-- 削除ボタンは別フォームで -->
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger me-2">削除</button>
                </form>

                <!-- 戻るボタン -->
                <a href="{{ route('items.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
