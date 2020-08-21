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
        // データベースに接続
        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user ='root';
        $password ='root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ='SELECT name FROM mst_staff WHERE 1';
        $stmt = $dbh -> prepare($sql);
        $stmt = $execute();

        $dbh = null;

        print 'スタッフ一覧 <br/><br/>';
        while(true){
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          if($rec == false){
            break;
          }
          print $rec['name'];
          print '<br/>';
        }
    }
    catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
    }
    ?>
  </body>
</html>