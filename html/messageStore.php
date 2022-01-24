<?php
$pdo = new PDO('mysql:dbname=test;host=mysql;charset=utf8', "test", "test");
if($_SERVER["REQUEST_METHOD"] == "GET"){
  // 新しい方から100件だけ取得する。
  $result = $pdo->query("SELECT id, name, message, UNIX_TIMESTAMP(createdAt) "
    . "from chatlog order by id desc limit 100");
  $ret = [];
  foreach($result->fetchAll() as $row) {
    $ret[] = ["id" => intval($row[0]),
      "name" => $row[1],
      "message" => $row[2],
      "createdAt" => intval($row[3])
      ];
  }
  // 古い順に並べ替えてjsonにして返す。
  print(json_encode(array_reverse($ret)));
} else if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $message = $_POST["message"];
  $createdAt = new DateTime('NOW');
  $s = $pdo->prepare("INSERT INTO chatlog (name, message, createdAt)"
    . " VALUE (:name, :message, FROM_UNIXTIME(:createdAt))");
  $s->execute(array(
    ":name" => $name, 
    ":message" => $message,
    ":createdAt" => $createdAt->getTimestamp()
  ));
  print(json_encode([
    "id" => $pdo->lastInsertId(),
    "createdAt" => $createdAt->getTimestamp()
    ]));
}
?>
