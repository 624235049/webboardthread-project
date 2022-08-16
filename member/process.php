<?php
include('../database.php');

// var_dump($_POST);
// exit;
$action = $_GET['action'];
if ($action == "CREATE") {
   $stmt = $db_con->prepare("INSERT INTO members (username, password, name, surname, tel, nickname) VALUES (:username, :password, :name, :surname, :tel, :nickname)");
   $stmt->bindParam("username", $_POST['username'], PDO::PARAM_STR);
   $stmt->bindParam("password", $_POST['password'], PDO::PARAM_STR);
   $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
   $stmt->bindParam("surname", $_POST['surname'], PDO::PARAM_STR);
   $stmt->bindParam("tel", $_POST['tel'], PDO::PARAM_STR);
   $stmt->bindParam("nickname", $_POST['nickname'], PDO::PARAM_STR);

   $result = $stmt->execute();
   if ($result) {
      // echo "<script>alert(`บันทึกข้อมูลได้สำเร็จ`)</script>";
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างบันทึกข้อมูล`)</script>";
   }
}

if ($action == "UPDATE") {
   $stmt = $db_con->prepare("UPDATE members SET name = :name, surname = :surname, nickname = :nickname, tel = :tel WHERE id = :id");
   $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
   $stmt->bindParam("surname", $_POST['surname'], PDO::PARAM_STR);
   $stmt->bindParam("nickname", $_POST['nickname'], PDO::PARAM_STR);
   $stmt->bindParam("tel", $_POST['tel'], PDO::PARAM_STR);
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างปรับปรุงข้อมูล`)</script>";
   }
}

if ($action == "DELETE") {
   $stmt = $db_con->prepare("DELETE FROM members WHERE id = :id ");
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างลบข้อมูล`)</script>";
   }
}
