<?php
include('../database.php');

$action = $_GET['action'];
if ($action == "CREATE") {
   $stmt = $db_con->prepare("INSERT INTO questions (title, detail, member_id) VALUES (:title, :detail, :member_id)");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("member_id", $member_id, PDO::PARAM_INT);

   $member_id = rand(1, 20); // get seesion member id

   $result = $stmt->execute();
   if ($result) {
      // echo "<script>alert(`บันทึกข้อมูลได้สำเร็จ`)</script>";
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างบันทึกข้อมูล`)</script>";
   }
}

if ($action == "UPDATE") {
   $stmt = $db_con->prepare("UPDATE questions SET title = :title, detail = :detail WHERE id = :id");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างปรับปรุงข้อมูล`)</script>";
   }
}

if ($action == "DELETE") {
   $stmt = $db_con->prepare("DELETE FROM questions WHERE id = :id ");
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างลบข้อมูล`)</script>";
   }
}