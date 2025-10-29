
# Laravel Sample App

このリポジトリは Laravel 学習用のサンプルアプリです。  
基本的なCRUD機能（登録・更新・削除）を含み、動作確認用のサンプルデータも付属しています。

「DBの初期データは sample.sql を import してください」

「mysql -u root -p laravel < sample.sql」
---

## セットアップ手順

### 1. リポジトリを clone
```bash
git clone <このリポジトリのURL>
cd <プロジェクトディレクトリ>

2. 依存関係をインストール
composer install
npm install && npm run build

3. 環境変数ファイルをコピー
cp .env.example .env


※ .env の内容は、ローカルのDB環境に合わせて編集してください。
例:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=（自分のパスワード）

4. アプリキーの生成
php artisan key:generate

5. データベースの準備
データベースを作成
mysql -u root -p -e "CREATE DATABASE laravel;"

サンプルデータを復元
mysql -u root -p laravel < laravel.sql

6. アプリを起動
php artisan serve

備考

laravel.sql にはサンプルのテーブルとデータが含まれています。

サンプルデータが不要な場合は、マイグレーションのみ実行してください。

php artisan migrate


---
