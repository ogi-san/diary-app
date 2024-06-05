# diary-app
Laravelで日記作成アプリの作成をした

## 環境構築手順
1. リポジトリのクローン
```bash
git clone https://github.com/ogitenda/diary-app.git
```
2. プロジェクトがあるディレクトリに移動
```bash
cd diary-app
```
3. .envの作成
```bash
cp .env.example .env
```
4. .envの編集
```bash
APP_TIMEZONE=Asia/Tokyo

APP_LOCALE=ja
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=ja_JP

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```
5. Dockerコンテナの立ち上げ
```bash
docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs
```
6. Laravel Sailの起動
    ```bash
sail up -d
```
7. アプリケーションキーの生成
```bash
sail artisan key:generate
```
8. マイグレーションの実行
```bash
sail artisan migrate --seed
```
9. Node.jsのパッケージ管理するnpmをインストール
```bash
sail npm install
```
10. Vite 開発サーバの起動
 ```bash
sail npm run dev
```
11. ブラウザのURLにlocalhostと入力しアクセス

## アクセスできないとき
他のLaravelプロジェクトはsail stopしておこう
