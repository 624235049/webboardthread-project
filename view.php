<?php
include('./config/database.php');
include('./config/constant.php');
include('./templates/head.php');

$stmt = $db_con->prepare("SELECT * FROM questions WHERE id = :id");
$stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body class="app sidebar-mini">
   <!-- Navbar-->
   <?php include('./templates/header.php'); ?>

   <main class="app-content ml-0">
      <div class="app-title">
         <div>
            <h1><i class="fa fa-pencil-square"></i> ถาม-ตอบ</h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="tile">
               <div class="tile-title-w-btn">
                  <h3 class="title">ดูรายการ #<?php echo $rows['id']; ?></h3>
               </div>
               <div class="tile-body">
                  <h6><?php echo $rows['title']; ?></h6>
                  <?php echo $rows['detail']; ?>
               </div>
               <div class="tile-footer text-mute">
                  <cite>วันที่สร้าง: <?php echo $rows['created_at']; ?></cite>
               </div>
            </div>

            <div class="tile">
               <div class="tile-title-w-btn">
                  <h3 class="title">ความคิดเห็น</h3>
               </div>
               <div class="tile-body">
                  <?php
                  $stmt = $db_con->prepare("SELECT * FROM replies WHERE question_id = :question_id");
                  $stmt->bindParam("question_id", $_GET['id']);
                  $stmt->execute();

                  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($results as $key => $value) {
                  ?>
                     <div class="tile">
                        <div class="tile-title-w-btn">
                           <h3 class="title">#<?php echo $value['commenter']; ?></h3>
                        </div>
                        <div class="tile-body">
                           <?php echo $value['detail']; ?>
                        </div>
                        <div class="tile-footer text-mute">
                           <cite>วันที่สร้าง: <?php echo $value['created_at']; ?></cite>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </div>

         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <form method="POST" action="process.php?action=REPLY&id=<?php echo $rows['id']; ?>" class="rendered-form">
               <div class="tile">
                  <div class="tile-title-w-btn">
                     <h3 class="title">ตอบคำถาม</h3>
                  </div>
                  <div class="tile-body">
                     <div class="row">
                        <div class="form-group col-md-4">
                           <label class="form-label">ชื่อเล่น</label><br>
                           <input type="text" class="form-control" placeholder="ระบุชื่อเล่น" name="commenter" required="required" aria-required="true">
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

   <?php include('./templates/footer.php'); ?>

</body>

</html>