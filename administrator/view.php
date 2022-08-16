<?php
include('../database.php');
include('../templates/head.php');

$stmt = $db_con->prepare("SELECT * FROM members WHERE id = :id");
$stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body class="app sidebar-mini">
   <!-- Navbar-->
   <?php include('../templates/header.php'); ?>

   <main class="app-content">
      <div class="app-title">
         <div>
            <h1><i class="fa fa-user"></i> ข้อมูลสมาชิก</h1>
            <p>แสดงข้อมูลรายการสามารถเพิ่ม/แก้ไข/ลบข้อมูลได้</p>
         </div>
         <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="./index.php">ข้อมูลรายการ</a></li>
            <li class="breadcrumb-item">ดูรายการ</li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="tile">
               <div class="tile-title-w-btn">
                  <h3 class="title">ดูรายการ #<?php echo $rows['id']; ?></h3>
               </div>
               <div class="tile-body">
                  <table class="table table-bordered table-sm">
                     <tr>
                        <th align="left">ชื่อผู้ใช้งาน</th>
                        <td><?php echo $rows['username']; ?></td>
                     </tr>
                     <tr>
                        <th align="left">รหัสผ่าน</th>
                        <td><?php echo $rows['password']; ?></td>
                     </tr>
                     <tr>
                        <th align="left">ชื่อ</th>
                        <td><?php echo $rows['name']; ?></td>
                     </tr>
                     <tr>
                        <th align="left">สกุล</th>
                        <td><?php echo $rows['surname']; ?></td>
                     </tr>
                     <tr>
                        <th align="left">ชื่อเล่น</th>
                        <td><?php echo $rows['nickname']; ?></td>
                     </tr>
                     <tr>
                        <th align="left">เบอร์โทรศัพท์</th>
                        <td><?php echo $rows['tel']; ?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </main>

   <?php include('../templates/footer.php'); ?>

</body>

</html>