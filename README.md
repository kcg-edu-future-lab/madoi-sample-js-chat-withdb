# madoi-sample-chat-js-withdb

チャットログを保存するサーバ(PHP)を利用するチャットアプリケーションのサンプルです。

送信ボタンがクリックされると，まずDBにメッセージが保存され，それが成功すれば，madoiを使ってメッセージを配信しています。

DBには全てのチャットログが保存され，madoiには最後のクライアントが切断してから10分経過するまでログ(ChatクラスのgetStateが返したオブジェクト)が保持されます。

DBからチャットログを受け取った後に追加されたメッセージは，madoiへの接続時に受け取れるため，取りこぼしは発生しません。

## 起動方法

1. Dockerをインストールしてください(Linuxで動かす場合，docker-composeもインストールしてください)。
2. このリポジトリをcloneしてください。 `git clone https://github.com/kcg-edu-future-lab/madoi-sample-chat-js-withdb`
3. cloneしたディレクトリ(`madoi-sample-chat-js-withdb`)で，`docker-compose up`を実行してください。
4. http://localhost:8080/ にアクセスすると，チャットアプリケーションが開きます。
