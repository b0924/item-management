<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>会員登録画面</title>
    <style>
        /* 全体を中央に配置するための設定 */
body, html {
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f5f5f5;
}

/* フォーム自体のスタイルを整える */
form {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-sizing: border-box;
}

/* タイトルのスタイル */
h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
}

/* フォーム要素のスタイル */
.form-control {
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

/* ボタンのスタイル */
.btn-primary, .btn-secondary {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    border: none;
    margin-top: 10px;
}

.btn-primary {
    background-color: #007bff;
}

.btn-secondary {
    background-color: #6c757d;
}

/* エラーメッセージのスタイル */
.alert-danger {
    margin-top: 15px;
    padding: 10px;
    border-radius: 5px;
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    display: block;
    height: 50px; /* ここでエラーメッセージの高さを固定 */
    overflow: hidden; /* エラーメッセージが多くても高さを超えないように */
}

/* エラーメッセージのスペースを常に確保 */
form .error-placeholder {
    height: 50px; /* エラーメッセージと同じ高さに */
    visibility: hidden; /* 通常は非表示に */
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">会員登録</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">名前</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">パスワード確認</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="{{ route('login') }}" class="btn btn-secondary">戻る</a>
        </form>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

