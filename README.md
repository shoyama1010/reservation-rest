# reservation-rest
ER図


## 環境構築
**Dockerビルド**
1. `git clone git@.github.com:shoyama1010/reservation-rest.git
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build
4. 

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

5. composerを実行し、PHPパッケージをインストールする。

    ```bash
    composer install

6. APPキーを生成する。

    ```bash
    php artisan key:generate
    ```

    -  これを行わないと起動時に「No application encryption key has been specified.」エラーが表示される。

7. Docker環境構築

    初回、及びenvファイルdocker設定が変更された場合に実行する。

    ```bash
    docker-compose build
    ```

8. Dockerコンテナの起動

    ```bash
    docker-compose up -d
    ```

    - 正しく動作しない場合は -d を付けないで動かしログを確認

9. migrationとseeederの実行

    Dockerコンテナ上で、テーブルの構築と初期データの投入を行う。

    ```bash
    docker-compose exec php-fpm bash
    php artisan migrate

10.アクセス
http://localhost/
