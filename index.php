<?php 
require_once("includes/header.php");
include_once("includes/notice.php");

// $notice = new CategoryContainers($con);
// echo $notice->showNotice(1, "XD");


$containers = new CategoryContainers($con);
echo $containers->showAllCategories();

include("includes/footer.php");
?>



