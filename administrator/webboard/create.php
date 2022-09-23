<?php
include('../../config/database.php');
include('../../config/constant.php');
include('../is_logged.php');
include('../templates/head.php');
?>

<body class="app sidebar-mini">
   <!-- Navbar-->
   <?php include('../templates/header.php'); ?>

   <main class="app-content">
      <div class="app-title">
         <div>
            <h1><i class="fa fa-pencil-square"></i> ข้อมูลเว็บบอร์ด</h1>
            <p>แสดงข้อมูลรายการสามารถเพิ่ม/แก้ไข/ลบข้อมูลได้</p>
         </div>
         <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="./index.php">ข้อมูลรายการ</a></li>
            <li class="breadcrumb-item">สร้างรายการ</li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-10">
            <form method="POST" action="process.php?action=CREATE" class="rendered-form">
               <div class="tile">
                  <div class="tile-title-w-btn">
                     <h3 class="title">สร้างรายการ</h3>
                  </div>
                  <div class="tile-body">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label">หัวข้อ</label><br>
                           <input type="text" class="form-control" placeholder="ระบุหัวข้อ" name="title" required="required" aria-required="true">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label">รายละเอียด</label><br>
                           <textarea class="form-control" id="summernote" placeholder="ระบุรายละเอียด" name="detail" required="required" rows="3"></textarea>
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