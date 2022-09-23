<?php
include('./config/database.php');

$action = $_GET['action'];
if ($action == "REPLY") {
   $stmt = $db_con->prepare("INSERT INTO replies (detail, commenter, question_id) VALUES (:detail, :commenter, :question_id)");
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("commenter", $_POST['commenter'], PDO::PARAM_STR);
   $stmt->bindParam("question_id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      // echo "<script>alert(`บันทึกข้อมูลได้สำเร็จ`)</script>";
      header("Location: ./view.php?id={$_GET['id']}");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างบันทึกข้อมูล`)</script>";
   }
}
