## 商品管理システム

##　概要
このシステムでは、店舗で扱う商品を登録、編集、削除などの機能を使って、
商品を管理することが可能。また、商品検索機能も追加されているため、目的の商品をすぐに
見つけ出すことができ業務効率の向上を図る。
登録されたユーザーも管理でき、管理者権限が付与されたアカウントのみ操作可能。

## 主な機能
・ログイン、ログアウト機能
・会員登録機能
・商品一覧画面
・商品新規登録、編集、削除機能
・商品検索機能
・ユーザー管理機能

## 開発環境
PHP 7.4
MySQL 14.14
LARAVEL 8.75

## 設計書
[https://drive.google.com/drive/folders/1Y6dkEpsYS-4R_iYNU9ZS4VsrkJbpiIuw?usp=drive_link]

## システムページ
[https://items-management-df89cd516b24.herokuapp.com]

## テストアカウント
メールアドレス:admin021@gmail.com
パスワード:sample123456

### 環境構築手順

* Gitクローン
* .env.example をコピーして .env を作成
* MySQLのデータベース作成（名前：item_management）
* Macの場合 .env の DB_PASSWORD を root に修正（Windowsは修正不要）

    ```INI
    DB_PASSWORD=root
    ```

* APP_KEY生成

    ```console
    php artisan key:generate
    ```

* Composerインストール

    ```console
    composer install
    ```

* フロント環境構築

    ```console
    npm ci
    npm run build
    ```

* マイグレーション

    ```console
    php artisan migrate
    ```

* 起動

    ```console
    php artisan serve
    ```
