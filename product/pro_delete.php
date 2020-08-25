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
      $pro_code=$_GET['procode'];

      // データベースに接続
      $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
      $user ='root';
      $password ='root';
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // スタッフコードで絞り込む
      $sql = 'SELECT name FROM mst_product WHERE code=?';
      $stmt = $dbh ->prepare($sql);
      $data[]=$pro_code;
      $stmt->execute($data);

      // スタッフ名を変数$pro_nameにコピー
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $pro_name=$rec['name'];

      $dbh = null;
    }
    catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
    }
    ?>

    商品削除<br/>
    <br/>
    商品コード
    <?php print $pro_code; ?>
    <br/>
    商品名<br/>
    <?php print $pro_name ?>
    <br/>
    この商品を削除していいですか<br/>
    <br/>
    <form method="post" action="pro_delete_done.php">
      <input type="hidden" name="code" value="<?php print $pro_code; ?>">
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>