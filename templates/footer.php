<!-- Essential javascripts for application to work-->
<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/popper.min.js"></script>
<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/bootstrap.min.js"></script>
<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/vali-admin/js/plugins/pace.min.js"></script>

<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo ROOT_PROJECT; ?>/assets/plugins/summernote/lang/summernote-th-TH.min.js"></script>
<script>
   $(document).ready(function() {
      $('#summernote').summernote({
         lang: 'th-TH',
         height: 100
      });
   });
</script>
