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
      $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
      $stmt = $dbh ->prepare($sql);
      $data[]=$pro_code;
      $stmt->execute($data);

      // スタッフ名を変数$pro_nameにコピー
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $pro_name=$rec['name'];
      $pro_price=$rec['price'];
      $pro_gazou_name=$rec['gazou'];

      $dbh = null;

      // 文字画像ファイルがあれば表示のタグを準備する
      if($pro_gazou_name==''){
        $disp_gazou='';
      }else{
        $disp_gazou='<img src="../gazou/'.$pro_gazou_name.'">';
      }
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
    <!-- 画像を表示 -->
    <?php print $disp_gazou; ?>
    <br/>
    <br/>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  </body>
</html>