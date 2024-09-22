@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <!-- 更新フォーム -->
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="新しいパスワード（任意）">
                    </div>

                    <div class="form-group">
                        <label for="role">ユーザー権限</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>管理者</option>
                            <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>一般ユーザー</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex card-footer">
                    <button type="submit" class="btn btn-primary me-2">更新</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">戻る</a>
                </div>
            </form>

            <!-- 削除フォーム -->
            <form method="POST" action="{{ route('user.destroy', $user->id) }}" onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <div class="d-flex card-footer">
                    <button type="submit" class="btn btn-danger">削除</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
