<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
  </head>
  <body>
  <?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
?>
    <?php
      try
      {
        // 前画面から受け取ったデータをコピー
        $pro_code = $_POST['code'];
        $pro_gazou_name=$_POST['gazou_name'];

        // データベースに接続
        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user ='root';
        $password ='root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql文を使ってコードを追加
        $sql = 'DELETE FROM mst_product WHERE code=?';
        $stmt = $dbh ->prepare($sql);
        $data[] = $pro_code;
        $stmt->execute($data);

        // データベースから切断
        $dbh = null;

        if($pro_gazou_name != ''){
          unlink('../gazou/'.$pro_gazou_name);
        }

      }
      catch (Exception $e)
      {
        // データベースサーバーに障害が生じた際このプログラムが動く
        print 'ただいま障害により大変ご迷惑をおかけしています';
        exit();
      }
    ?>
    削除しました。<br/>
    <br/>
    <a href="pro_list.php">戻る</a>
  </body>
</html>