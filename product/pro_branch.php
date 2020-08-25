<?php

// スタッフ参照ページへ飛ぶ
if(isset($_POST['disp']) == true){
  // もしスタッフコードが選ばれていなかったらNG画面に飛ぶ
  if(isset($_POST['procode']) == false){
    header('Location: pro_ng.php');
    exit();
  }
  $pro_code=$_POST['procode'];
  header('Location: pro_disp.php?procode='.$pro_code);
  exit();
}

// スタッフ追加ページへ飛ぶ
if(isset($_POST['add']) == true){
  header('Location: pro_add.php');
  exit();
}

// スタッフ編集ページへ飛ぶ
if(isset($_POST['edit']) == true){
  // もしスタッフコードが選ばれていない場合はNG画面に飛ぶ
  if(isset($_POST['procode']) == false){
    header('Location: pro_ng.php');
    exit();
  }
  $pro_code=$_POST['procode'];
  header('Location: pro_edit.php?procode='.$pro_code);
  exit();
}

// スタッフ削除ページへ飛ぶ
if(isset($_POST['delete']) == true){
  // もしスタッフコードが選ばれていない場合はNG画面に飛ぶ
  if(isset($_POST['procode']) == false){
    header('Location: pro_ng.php');
    exit();
  }
  $pro_code=$_POST['procode'];
  header('Location: pro_delete.php?procode='.$pro_code);
  exit();
}
?>