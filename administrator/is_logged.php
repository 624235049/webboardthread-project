<?php
if (!isset($_SESSION["login_id"]) || $_SESSION["login_type"] != 1) {
   header("Location: ../index.php");
}
