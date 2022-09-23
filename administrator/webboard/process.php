<?php
include('../../config/database.php');
include('../../config/constant.php');
include('../is_logged.php');
include('../../helpers/url_helper.php');

$action = $_GET['action'];
if ($action == "CREATE") {
   $stmt = $db_con->prepare("INSERT INTO questions (title, detail, member_id) VALUES (:title, :detail, :member_id)");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("member_id", $member_id, PDO::PARAM_INT);

   $member_id = rand(1, 20); // get seesion member id

   $result = $stmt->execute();
   if ($result) {
      $_SESSION['alt']['message'] = '<strong>บันทึกข้อมูลได้สำเร็จ!</strong> ระบบทำการบันทึกข้อมูลได้สำเสร็จ';
      $_SESSION['alt']['type'] = 'success';
   } else {
      $_SESSION['alt']['message'] = '<strong>เกิดข้อผิดพลาด!</strong> เกิดข้อผิดพลาดในระหว่างการบันทึกข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง';
      $_SESSION['alt']['type'] = 'danger';
   }

   redirect_admin('webboard/index.php');
}

if ($action == "UPDATE") {
   $stmt = $db_con->prepare("UPDATE questions SET title = :title, detail = :detail WHERE id = :id");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      $_SESSION['alt']['message'] = '<strong>แก้ไขข้อมูลได้สำเร็จ!</strong> ระบบทำการแก้ไขข้อมูลได้สำเสร็จ';
      $_SESSION['alt']['type'] = 'success';
   } else {
      $_SESSION['alt']['message'] = '<strong>เกิดข้อผิดพลาด!</strong> เกิดข้อผิดพลาดในระหว่างการแก้ไขข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง';
      $_SESSION['alt']['type'] = 'danger';
   }

   redirect_admin('webboard/index.php');
}

if ($action == "DELETE") {
   $stmt = $db_con->prepare("DELETE FROM questions WHERE id = :id ");
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      $_SESSION['alt']['message'] = '<strong>ลบข้อมูลได้สำเร็จ!</strong> ระบบทำการลบข้อมูลได้สำเสร็จ';
      $_SESSION['alt']['type'] = 'success';
   } else {
      $_SESSION['alt']['message'] = '<strong>เกิดข้อผิดพลาด!</strong> เกิดข้อผิดพลาดในระหว่างการลบข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง';
      $_SESSION['alt']['type'] = 'danger';
   }

   redirect_admin('webboard/index.php');
}
