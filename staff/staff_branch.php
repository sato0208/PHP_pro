<?php

// スタッフ参照ページへ飛ぶ
if(isset($_POST['disp']) == true){
  // もしスタッフコードが選ばれていなかったらNG画面に飛ぶ
  if(isset($_POST['staffcode']) == false){
    header('Location: staff_ng.php');
    exit();
  }
  $staff_code=$_POST['staffcode'];
  header('Location: staff_disp.php?staffcode='.$staff_code);
  exit();
}

// スタッフ追加ページへ飛ぶ
if(isset($_POST['add']) == true){
  header('Location: staff_add.php');
  exit();
}

// スタッフ編集ページへ飛ぶ
if(isset($_POST['edit']) == true){
  // もしスタッフコードが選ばれていない場合はNG画面に飛ぶ
  if(isset($_POST['staffcode']) == false){
    header('Location: staff_ng.php');
    exit();
  }
  $staff_code=$_POST['staffcode'];
  header('Location: staff_edit.php?staffcode='.$staff_code);
  exit();
}

// スタッフ削除ページへ飛ぶ
if(isset($_POST['delete']) == true){
  // もしスタッフコードが選ばれていない場合はNG画面に飛ぶ
  if(isset($_POST['staffcode']) == false){
    header('Location: staff_ng.php');
    exit();
  }
  $staff_code=$_POST['staffcode'];
  header('Location: staff_delete.php?staffcode='.$staff_code);
  exit();
}
?>