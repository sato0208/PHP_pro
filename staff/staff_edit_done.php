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
        $staff_code = $_POST['code'];
        $staff_name = $_POST['name'];
        $staff_pass = $_POST['pass'];

        // 入力データに安全対策
        $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
        $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

        // データベースに接続
        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user ='root';
        $password ='root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql文を使ってコードを追加
        $sql = 'UPDATE mst_staff SET name=?, password=? WHERE code=?';
        $stmt = $dbh ->prepare($sql);
        $data[] = $staff_name;
        $data[] = $staff_pass;
        $data[] = $staff_code;
        $stmt->execute($data);

        // データベースから切断
        $dbh = null;

      }
      catch (Exception $e)
      {
        // データベースサーバーに障害が生じた際このプログラムが動く
        print 'ただいま障害により大変ご迷惑をおかけしています';
        exit();
      }
    ?>
    <!-- TODO スタッフ一覧画面の作成 -->
    修正しました。<br/>
    <br/>
    <a href="staff_list.php">戻る</a>
  </body>
</html>