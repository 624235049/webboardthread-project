<?php
if (!isset($_SESSION["login_id"]) || $_SESSION["login_type"] != 2) {
   header("Location: ../index.php");
}
