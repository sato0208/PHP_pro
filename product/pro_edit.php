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
      $pro_gazou_name_ord=$rec['gazou'];

      $dbh = null;

      if($pro_gazou_name_ord==''){
        $disp_gazou='';
      }else{
        $disp_gazou='<img src="../gazou/'.$pro_gazou_name_ord.'">';
      }
    }
    catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
    }
    ?>

    商品修正<br/>
    <br/>
    商品コード<br/>
    <?php print $pro_code; ?>
    <br/>
    <form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
      <input type="hidden" name="code" value="<?php print $pro_code; ?>">
      <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_ord; ?>">
      商品名<br/>
      <!-- 名前を入れた状態で表示させる -->
      <input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br/>
      価格<br/>
      <input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>">円<br/>
      <br/>
      <?php print $disp_gazou; ?>
      <br/>
      画像を選んでください。<br/>
      <input type="file" name="gazou" style="width:400px"><br/>
      <br/>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>