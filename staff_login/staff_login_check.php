<?php 
  try{

    $staff_code=$_POST['code'];
    $staff_pass=$_POST['pass'];

    $staff_code=htmlspecialchars($staff_code,ENT_QUOTES,'UTF-8');
    $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

    $staff_pass=md5($staff_pass);

    $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
    $user ='root';
    $password ='root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql ='SELECT code, name FROM mst_staff WHERE code=? AND password=?';
    $stmt = $dbh -> prepare($sql);
    $data[] = $staff_code;
    $data[] = $staff_pass;
    $stmt -> execute($data);

    $dbh = null;

    if($rec==false){
      print 'スタッフコードかパスワードが間違っています<br/>';
      print '<a href~"staff_login.html">戻る</a>';
    }else{
      header('Location: staff_top.php');
      exit();
    }
  }

  catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をおかけしております';
    exit();
  }
?>