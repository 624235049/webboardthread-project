<?php
include('../../config/database.php');
include('../../config/constant.php');
include('../is_logged.php');
include('../templates/head.php');

$stmt = $db_con->prepare("SELECT * FROM questions WHERE id = :id");
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
            <h1><i class="fa fa-pencil-square"></i> ข้อมูลเว็บบอร์ด</h1>
            <p>แสดงข้อมูลรายการสามารถเพิ่ม/แก้ไข/ลบข้อมูลได้</p>
         </div>
         <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="./index.php">ข้อมูลรายการ</a></li>
            <li class="breadcrumb-item">แก้ไขรายการ</li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-10">
            <form method="POST" action="process.php?action=UPDATE&id=<?php echo $rows['id']; ?>" class="rendered-form">
               <div class="tile">
                  <div class="tile-title-w-btn">
                     <h3 class="title">แก้ไขรายการ</h3>
                  </div>
                  <div class="tile-body">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label">หัวข้อ</label><br>
                           <input type="text" class="form-control" placeholder="ระบุหัวข้อ" name="title" value="<?php echo $rows['title']; ?>" required="required" aria-required="true">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label">รายละเอียด</label><br>
                           <textarea class="form-control" placeholder="ระบุรายละเอียด" id="summernote" name="detail" required="required" rows="3"><?php echo $rows['detail']; ?></textarea>
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