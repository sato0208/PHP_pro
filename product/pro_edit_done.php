<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php
      try
      {
        // 前画面から受け取ったデータをコピー
        $pro_code = $_POST['code'];
        $pro_name = $_POST['name'];
        $pro_price = $_POST['price'];
        $pro_gazou_name_old = $_POST['gazou_name_old'];
        $pro_gazou_name = $_POST['gazou_name'];

        // 入力データに安全対策
        $pro_code = htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
        $pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
        $pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

        // データベースに接続
        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user ='root';
        $password ='root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql文を使ってコードを追加
        $sql = 'UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
        $stmt = $dbh ->prepare($sql);
        $data[] = $pro_name;
        $data[] = $pro_price;
        $data[] = $pro_gazou_name;
        $data[] = $pro_code;
        $stmt->execute($data);

        // データベースから切断
        $dbh = null;

      if($pro_gazou_name_old != $pro_gazou_name_old){
        // もし古い画像があれば削除する
        if($pro_gazou_name_old!=''){
          unlink('../gazou/'.$pro_gazou_name_old);
        }
      }
        // さんを追加しましたと表示させる
        print '修正しました。<br/>';
      }
      catch (Exception $e)
      {
        // データベースサーバーに障害が生じた際このプログラムが動く
        print 'ただいま障害により大変ご迷惑をおかけしています';
        exit();
      }
    ?>
    <!-- TODO スタッフ一覧画面の作成 -->
    <a href="pro_list.php">戻る</a>
  </body>
</html>