# madoi-sample-js-chat-withdb

チャットログを保存するサーバ(PHP)を利用するチャットアプリケーションのサンプルです。

送信ボタンがクリックされると，まずDBにメッセージが保存され，それが成功すれば，madoiを使ってメッセージを配信しています。

DBには全てのチャットログが保存され，madoiには最後のクライアントが切断してから10分経過するまでログ(ChatクラスのgetStateが返したオブジェクト)が保持されます。

DBからチャットログを受け取った後に追加されたメッセージは，madoiへの接続時に受け取れるため，取りこぼしは発生しません。

## 起動方法

1. Dockerをインストールしてください(Linuxで動かす場合，docker-composeもインストールしてください)。
2. Madoiをcloneして、Madoiサーバを起動してください。
    a. `git clone https://github.com/kcg-edu-future-lab/madoi`
    b. `cd madoi`
    c. `docker-compose up`
3. このリポジトリをcloneして、起動してください
    a. `git clone https://github.com/kcg-edu-future-lab/madoi-sample-js-chat-withdb`
    b. `cd madoi-sample-js-chat-withdb`
    c. `docker-compose up`
4. http://localhost:8081/ にアクセスすると、チャットアプリケーションが開きます。
5. http://localhost:8000/ にアクセスすると、チャットログを格納しているMySQLデータベースが閲覧できます。

## 注意点
- Madoiのアクセスキーは、デフォルトのものを使用しています。必要に応じて、madoiの `docker-compose.yml` やこのアプリの `index.html` に記載してあるアクセスキーを変更してください。
- MySQLのデータベース管理画面(http://localhost:8000/)には、ユーザ認証は設定されていません。インターネット上に公開する場合は、適切にアクセス制限を行ってください。
