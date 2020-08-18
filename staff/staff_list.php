<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    try
    {
      // データベースに接続
        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user ='root';
        $password ='';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  </body>
</html>