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
      $sql = 'SELECT name,price FROM mst_product WHERE code=?';
      $stmt = $dbh ->prepare($sql);
      $data[]=$pro_code;
      $stmt->execute($data);

      // スタッフ名を変数$pro_nameにコピー
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $pro_name=$rec['name'];
      $pro_price=$rec['price'];

      $dbh = null;
    }
    catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
    }
    ?>

    商品情報参照<br/>
    <br/>
    商品コード<br/>
    <?php print $pro_code; ?>
    <br/>
    商品名<br/>
    <?php print $pro_name; ?>
    <br/>
    価格<br/>
    <?php print $pro_price; ?> 円
    <br/>
    <br/>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  </body>
</html>