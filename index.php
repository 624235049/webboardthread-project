<?php
include('./config/database.php');
include('./config/constant.php');
include('./templates/head.php');
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
               <div class="tile-body">
                  <table class="table table-sm table-hover">
                     <thead>
                        <tr>
                           <th scope="col" class="text-center text-nowrap">ลำดับที่</th>
                           <th scope="col" class="text-center text-nowrap">หัวข้อคำถาม</th>
                        </tr>
                     </thead>
                     <tbody>

                        <?php
                        $limit = 15;
                        $stmt = $db_con->prepare("SELECT * FROM questions");
                        $stmt->execute();
                        $num_row = $stmt->rowCount();
                        $num_pages = ceil($num_row / $limit);

                        if (!isset($_GET['page'])) {
                           $page = 1;
                        } else {
                           $page = $_GET['page'];
                        }

                        $prev_page = $page - 1;
                        $next_page = $page + 1;

                        $start = ($page - 1) * $limit;
                        $no = $page > 1 ? $start + 1 : 1;

                        $stmt = $db_con->prepare("SELECT * FROM questions ORDER BY id DESC LIMIT $start, $limit");
                        $stmt->execute();

                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($results as $rows) {
                        ?>
                           <tr>
                              <td><?php echo $no++; ?></td>
                              <td>
                                 <a href="./view.php?id=<?php echo $rows['id']; ?>" class="d-block"><?php echo $rows['title']; ?></a>
                                 <span class="badge badge-light"><?php echo $rows['created_at']; ?></span>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               <div class="tile-footer">
                  <nav aria-label="Page navigation example">
                     <ul class="pagination">
                        <?php
                        if ($prev_page && $num_pages >= 5) {
                        ?>
                           <li class="page-item">
                              <a class="page-link" href="?page=1" aria-label="Previous">
                                 <span aria-hidden="true">&laquo;</span>
                              </a>
                           </li>
                        <?php
                        }

                        if ($prev_page) {
                        ?>
                           <li class="page-item">
                              <a class="page-link" href="?page=<?php echo $prev_page; ?>" aria-label="Previous">
                                 &#10510;ก่อนหน้า
                              </a>
                           </li>
                           <?php
                        }

                        for ($n = 1; $n <= $num_pages; $n++) {
                           $start_link = $page - 5;
                           $end_link = $page + 5;

                           if ($n != $page && $n <= $start_link) {
                              if (!isset($prev_dot)) {
                                 $prev_dot = 1;
                           ?>
                                 <li class="page-item"><a class="page-link">...</a></li>
                              <?php
                              }
                           } elseif ($n != $page && $n >= $start_link && $n <= $end_link) {
                              ?>
                              <li class="page-item"><a class="page-link" href="?page=<?php echo $n; ?>"><?php echo $n; ?></a></li>
                           <?php
                           } elseif ($n == $page) {
                           ?>
                              <li class="page-item active"><a class="page-link" href="#"><?php echo $n; ?></a></li>
                              <?php
                           } elseif ($end_link != $num_pages) {
                              if (!isset($next_dot)) {
                                 $next_dot = 1;
                              ?>
                                 <li class="page-item"><a class="page-link">...</a></li>
                           <?php
                              }
                           }
                        }

                        if ($page != $num_pages) {
                           ?>
                           <li class="page-item">
                              <a class="page-link" href="?page=<?php echo $next_page; ?>" aria-label="Previous">
                                 ถัดไป&#10509;
                              </a>
                           </li>
                        <?php
                        }

                        if (($page != $num_pages) && $num_pages >= 5) {
                        ?>
                           <li class="page-item">
                              <a class="page-link" href="?page=<?php echo $num_pages; ?>" aria-label="Previous">
                                 <span aria-hidden="true">&raquo;</span>
                              </a>
                           </li>
                        <?php
                        }
                        ?>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </main>

   <?php include('./templates/footer.php'); ?>

</body>

</html>
