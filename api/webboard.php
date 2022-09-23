<?php

include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
   $stmt = $db_con->prepare("SELECT * FROM questions LIMIT 5");
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   echo json_encode($results);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $stmt = $db_con->prepare("INSERT INTO questions (title, detail, member_id) VALUES (:title, :detail, :member_id)");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("member_id", $_POST['member_id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      echo json_encode(["message" => "ระบบทำการบันทึกข้อมูลได้สำเสร็จ"], JSON_UNESCAPED_UNICODE);
   } else {
      echo json_encode(["message" => "เกิดข้อผิดพลาดในระหว่างการบันทึกข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง"], JSON_UNESCAPED_UNICODE);
   }
}