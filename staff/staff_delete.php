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
    try{
      // 選択されたスタッフコードを受け取る
      $staff_code=$_GET['staffcode'];

      // データベースに接続
      $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
      $user ='root';
      $password ='root';
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // スタッフコードで絞り込む
      $sql = 'SELECT name FROM mst_staff WHERE code=?';
      $stmt = $dbh ->prepare($sql);
      $data[]=$staff_code;
      $stmt->execute($data);

      // スタッフ名を変数$staff_nameにコピー
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $staff_name=$rec['name'];

      $dbh = null;
    }
    catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
    }
    ?>

    スタッフ削除<br/>
    <br/>
    スタッフコード
    <?php print $staff_code; ?>
    <br/>
    スタッフ名<br/>
    <?php print $staff_name ?>
    <br/>
    このスタッフを削除していいですか<br/>
    <br/>
    <form method="post" action="staff_delete_done.php">
      <input type="hidden" name="code" value="<?php print $staff_code; ?>">
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>