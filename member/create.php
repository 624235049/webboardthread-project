<?php
include('../database.php');
include('../templates/head.php');
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
            <li class="breadcrumb-item">สร้างรายการ</li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-6">
            <form method="POST" action="process.php?action=CREATE" class="rendered-form">
               <div class="tile">
                  <div class="tile-title-w-btn">
                     <h3 class="title">สร้างรายการ</h3>
                  </div>
                  <div class="tile-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label class="form-label">ชื่อผู้ใช้งาน</label><br>
                           <input type="text" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" name="username" required="required" aria-required="true">
                        </div>
                        <div class="form-group col-md-6">
                           <label class="form-label">รหัสผ่าน</label><br>
                           <input type="password" class="form-control" placeholder="ระบุรหัสผ่าน" name="password" required="required" aria-required="true">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-4">
                           <label class="form-label">ชื่อ</label><br>
                           <input type="text" class="form-control" placeholder="ระบุชื่อ" name="name" required="required" aria-required="true">
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">สกุล</label><br>
                           <input type="text" class="form-control" placeholder="ระบุสกุล" name="surname" required="required" aria-required="true">
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">ชื่อเล่น</label><br>
                           <input type="text" class="form-control" placeholder="ระบุชื่อเล่น" name="nickname">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label class="form-label">เบอร์โทรศัพท์</label><br>
                           <input type="tel" class="form-control" placeholder="ระบุเบอร์โทรศัพท์" name="tel">
                        </div>
                     </div>
                  </div>
                  <div class="tile-footer">
                     <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                     <button class="btn btn-secondary" type="reset">ยกเลิก</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </main>

   <?php include('../templates/footer.php'); ?>

</body>

</html>