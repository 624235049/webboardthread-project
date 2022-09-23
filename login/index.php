<?php
include('../config/constant.php');
?>
<!DOCTYPE html>
<html>

<head>
   <title>Login - SKRU App</title>
   <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
   <!-- Twitter meta-->
   <meta property="twitter:card" content="summary_large_image">
   <meta property="twitter:site" content="@pratikborsadiya">
   <meta property="twitter:creator" content="@pratikborsadiya">
   <!-- Open Graph Meta-->
   <meta property="og:type" content="website">
   <meta property="og:site_name" content="Vali Admin">
   <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
   <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
   <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
   <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Main CSS-->
   <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/css/main.css">
   <!-- Font-icon css-->
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PROJECT; ?>/assets/css/styles.css">
</head>

<body>
   <section class="material-half-bg">
      <div class="cover"></div>
   </section>
   <section class="login-content">
      <div class="logo">
         <h1>SKRU App</h1>
      </div>
      <div class="login-box">
         <form class="login-form" method="POST" action="./process.php">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>เข้าสู่ระบบ</h3>
            <div class="form-group">
               <label class="control-label">ชื่อผู้ใช้งาน</label>
               <input class="form-control" type="text" name="username" placeholder="ระบุชื่อผู้ใช้งาน" autofocus>
            </div>
            <div class="form-group">
               <label class="control-label">รหัสผ่าน</label>
               <input class="form-control" type="password" name="password" placeholder="ระบุรหัสผ่าน">
            </div>
            <div class="form-group btn-container">
               <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>เข้าสู่ระบบ</button>
            </div>
         </form>
      </div>
   </section>
   <!-- Essential javascripts for application to work-->
   <script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/jquery-3.3.1.min.js"></script>
   <script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/popper.min.js"></script>
   <script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/bootstrap.min.js"></script>
   <script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/main.js"></script>
   <!-- The javascript plugin to display page loading on top-->
   <script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/plugins/pace.min.js"></script>
</body>

</html>