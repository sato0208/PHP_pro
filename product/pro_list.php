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
        // データベースに接続
        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user ='root';
        $password ='root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ='SELECT code,name,price FROM mst_product WHERE 1';
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();

        $dbh = null;

        print '商品一覧 <br/><br/>';

        // 修正画面屁飛べるようにする
        print '<form method="post" action="pro_branch.php">';
        while(true){
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          if($rec == false){
            break;
          }
          // ラジオボタン でどのスタッフを選んだかを跳び先でわかるようにスタッフコードを渡す
          print '<input type="radio" name="procode" value="'.$rec['code'].'">';
          print $rec['name'].'---';
          print $rec['price'].'円';
          print '<br/>';
        }
        print '<input type="submit" name="disp" value="参照">';
        print '<input type="submit" name="add" value="追加">';
        print '<input type="submit" name="edit" value="修正">';
        print '<input type="submit" name="delete" value="削除">';
        print '</form>';
    }
    catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
    }
    ?>
  </body>
</html>