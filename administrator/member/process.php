<?php
include('../../config/database.php');
include('../../config/constant.php');
include('../is_logged.php');
include('../../helpers/url_helper.php');

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
      $_SESSION['alt']['message'] = '<strong>บันทึกข้อมูลได้สำเร็จ!</strong> ระบบทำการบันทึกข้อมูลได้สำเสร็จ';
      $_SESSION['alt']['type'] = 'success';
   } else {
      $_SESSION['alt']['message'] = '<strong>เกิดข้อผิดพลาด!</strong> เกิดข้อผิดพลาดในระหว่างการบันทึกข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง';
      $_SESSION['alt']['type'] = 'danger';
   }

   redirect_admin('member/index.php');
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
      $_SESSION['alt']['message'] = '<strong>แก้ไขข้อมูลได้สำเร็จ!</strong> ระบบทำการแก้ไขข้อมูลได้สำเสร็จ';
      $_SESSION['alt']['type'] = 'success';
   } else {
      $_SESSION['alt']['message'] = '<strong>เกิดข้อผิดพลาด!</strong> เกิดข้อผิดพลาดในระหว่างการแก้ไขข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง';
      $_SESSION['alt']['type'] = 'danger';
   }

   redirect_admin('member/index.php');
}

if ($action == "DELETE") {
   $stmt = $db_con->prepare("DELETE FROM members WHERE id = :id ");
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      $_SESSION['alt']['message'] = '<strong>ลบข้อมูลได้สำเร็จ!</strong> ระบบทำการลบข้อมูลได้สำเสร็จ';
      $_SESSION['alt']['type'] = 'success';
   } else {
      $_SESSION['alt']['message'] = '<strong>เกิดข้อผิดพลาด!</strong> เกิดข้อผิดพลาดในระหว่างการลบข้อมูล กรุณาตรวจสอบใหม่อีกครั้ง';
      $_SESSION['alt']['type'] = 'danger';
   }

   redirect_admin('member/index.php');
}
