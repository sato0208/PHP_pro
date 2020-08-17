<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php
      $staff_name=$_POST['name'];
      $staff_pass=$_POST['pass'];
      $staff_pass2=$_POST['pass2'];

      $staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
      $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
      $staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

      if($staff_name=='')
      {
        print 'スタッフ名が入力されていません <br/>';
      }
    ?>
  </body>
</html>