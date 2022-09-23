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
            <li class="breadcrumb-item">ดูรายการ</li>
         </ul>
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
   </main>

   <?php include('../templates/footer.php'); ?>

</body>

</html>