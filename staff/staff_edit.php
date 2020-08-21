<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
  </head>
  <body>
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
      $sql = 'SELECT name FROM mast_staff WHERE code=?';
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
  </body>
</html>