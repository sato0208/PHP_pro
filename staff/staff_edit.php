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
      $staff_code=$_POST['staffcode'];

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

    スタッフ修正<br/>
    <br/>
    <br/>
    <form method="post" action="staff_edit_check.php">
      <input type="hidden" name="code" value="<?php print $staff_code; ?>">
      スタッフ名<br/>
      <!-- 名前を入れた状態で表示させる -->
      <input type="text" name="name" style="width:100px" value="<?php print $staff_name; ?>"><br/>
      パスワードを入力して下さい。<br/>
      <input type="password" name="pass" style="width:200px"><br/>
      パスワードをもう一度入力してください。<br/>
      <input type="password" name="pass2" style="width:200px"><br/>
      <br/>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>